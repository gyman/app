<?php

namespace Gyman\Bundle\MultiDatabaseBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LoadClubFixturesCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('gyman:database:load_fixtures')
            ->setDescription('Loads fixtures for club connection on selected name')
            ->addArgument('name', InputArgument::REQUIRED, 'Club name (will be converted to slug)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $clubName = $input->getArgument('name');
        $command = $this->getApplication()->find('doctrine:fixtures:load');
        $command->setContainer($this->getContainer());

        $this->dataBaseWorker->loadFixtures($clubName, $command, $output, $input->getOption('env'));
    }
}
