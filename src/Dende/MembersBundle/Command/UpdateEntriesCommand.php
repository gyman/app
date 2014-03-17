<?php

namespace Dende\MembersBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class UpdateEntriesCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('entries:update')
                ->setDescription('Closes old entries')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $em = $this->getContainer()->get("doctrine")->getManager();
        
        $now = new \DateTime();
        $memberRepository = $this->getContainer()->get("member_repository");
        
        $members = $memberRepository->getQuery("m")
                        ->where("m.lastEntry is not null")
                        ->getQuery()->execute();
       
        if (count($members) == 0)
        {
            return;
        }

        $ids = array();

        foreach ($members as $member) {
            /** @var Member $member */
            
            /** @var Entry $entry */
            $entry = $member->getLastEntry();

            
            var_dump($entry);
            
//            $member->setLastEntry(null);
//            $ids[] = $member->getId();
//            $em->persist($member);
        }

//        $em->flush();

        $message = sprintf("Found and updated %d members", count($ids));

        $output->writeln($message);
        $this->getContainer()->get("logger")->info($message, $ids);
    }
}
