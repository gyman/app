<?php

namespace Gyman\Bundle\MembersBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateVouchersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
                ->setName('vouchers:update')
                ->setDescription('Removes old vouchers and sets actual')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get("doctrine")->getManager();
        $now = new \DateTime();
        $memberRepository = $this->getContainer()->get("member_repository");
        $members = $memberRepository->getQuery()
                        ->leftJoin("m.currentVoucher", "v")
                        ->where("v.endDate < :now")
                        ->setParameters(array(
                            "now" => $now,
                        ))
                        ->getQuery()->execute();

        $ids = array();

        if (count($members) > 0) {
            foreach ($members as $member) {
                $member->setCurrentVoucher(null);
                $em->persist($member);
            }
        }
        /** vouchers that were sold with date in future */

        $voucherRepository = $this->getContainer()->get("voucher_repository");
        $vouchers = $voucherRepository->getQuery("v")
                        ->where("v.startDate <= :now")
                        ->andWhere("v.endDate >= :now or v.endDate is null")
                        ->setParameters(array(
                            "now" => $now,
                        ))
                        ->getQuery()->execute();

        if (count($vouchers) > 0) {
            foreach ($vouchers as $voucher) {
                    $member = $voucher->getMember();
                    $member->setCurrentVoucher($voucher);
                    $em->persist($member);
                    $ids[] = $voucher->getId();
            }
        }

        $em->flush();

        $message = sprintf("Found and updated %d members", count($ids));

        $output->writeln($message);
        $this->getContainer()->get("logger")->info($message, $ids);
    }
}
