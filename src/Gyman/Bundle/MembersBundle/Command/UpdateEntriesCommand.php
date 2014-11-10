<?php

namespace Gyman\Bundle\MembersBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\QueryBuilder;

class UpdateEntriesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
                ->setName('entries:update')
                ->setDescription('Closes old entries')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get("doctrine")->getManager();

        $now = new \DateTime();
        $memberRepository = $this->getContainer()->get("entity_manager")->getRepository("MembersBundle:Member");

        /** @var QueryBuilder $query * */
        $query = $memberRepository->getQuery("m");

        $members = $query->select("m")
                        ->addSelect("l")
                        ->addSelect("a")
                        ->addSelect("e")
                        ->join("m.lastEntry", "l")
                        ->join("l.activity", "a")
                        ->join("a.events", "e")
                        ->where("m.lastEntry is not null")
                        ->andWhere("e.dayOfWeek = dayname(l.startDate)")
                        ->getQuery()->execute();

        if (count($members) == 0) {
            return;
        }

        $ids = array();
        $now = new \DateTime();

        foreach ($members as $member) {
            /** @var \Gyman\Bundle\MembersBundle\Entity\Member $member * */
            $lastEntry = $member->getLastEntry();

            $lastEvent = $lastEntry
                    ->getActivity()
                    ->getEvents()
                    ->first();

            $endDate = new \DateTime($lastEntry->getStartDate()->format("Y-m-d " . $lastEvent->getEndHour()));
            $endDate->add(new \DateInterval("PT15M"));

            $diff = $endDate->getTimestamp() - $now->getTimestamp();

            if ($diff <= 0) {
                $member->setLastEntry(null);
                $lastEntry->setEndDate($endDate);

                $em->persist($member);
                $em->persist($lastEntry);
            }
        }

        $em->flush();

        $message = sprintf("Found and updated %d members", count($ids));

        $output->writeln($message);
        $this->getContainer()->get("logger")->info($message, $ids);
    }
}
