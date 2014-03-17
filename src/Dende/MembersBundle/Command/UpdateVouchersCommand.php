<?php

namespace Dende\MembersBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateVouchersCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('vouchers:update')
                ->setDescription('Removes old vouchers and sets actual')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
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

        if (count($members) == 0)
        {
            return;
        }

        $ids = array();

        foreach ($members as $member) {
            $member->setCurrentVoucher(null);
            $em->persist($member);
        }

        $em->flush();

        $message = sprintf("Found and updated %d members", count($ids));

        $output->writeln($message);
        $this->getContainer()->get("logger")->info($message, $ids);
    }
}
