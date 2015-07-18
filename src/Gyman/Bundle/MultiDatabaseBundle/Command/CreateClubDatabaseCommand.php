<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateClubDatabaseCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('gyman:database:create')
            ->setDescription('Creates database schema for club connection on selected name')
            ->addArgument('name', InputArgument::REQUIRED, 'Club name (will be converted to slug)')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $clubName = $input->getArgument("name");
        $this->dataBaseWorker->setupDatabase($clubName);
    }
}
