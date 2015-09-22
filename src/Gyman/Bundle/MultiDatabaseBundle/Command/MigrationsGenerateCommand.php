<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MigrationsGenerateCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('gyman:migrations:generate')
            ->setDescription('Loads fixtures for club connection on selected name')
            ->addOption('em', null, InputOption::VALUE_OPTIONAL, 'The entity manager to use for this command.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = $this->getApplication()->find('doctrine:migrations:generate');

        $this->dataBaseWorker->generateMigrations($command, $output, $input);
    }
}
