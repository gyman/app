<?php

namespace Gyman\Bundle\LandingPageBundle\Command;

use Exception;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;

class MigrateTenantsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gyman:migrate_databases')
            ->setDescription('Runs migrations on all tenant databases')
            ->setHelp('This command allows you to create new clubs')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $kernel = $this->getContainer()->get("kernel");
        $logger = $this->getContainer()->get("logger");

        $clubs = $this->getContainer()->get("gyman.club.repository")->findAll();

        $clubs = array_map(function(Club $club){
            return $club->getSubdomain()->getName();
        }, $clubs);

        $output->writeln(sprintf("Migrating %d subdomains:", count($clubs)));

        $exitCode = 0;

        foreach($clubs as $club) {
            $output->write(sprintf("%s...", $club));

            $application = new Application($kernel);
            $application->setAutoExit(false);

            $params = [
                '--quiet' => true,
                '--no-ansi' => true,
                '--env' => 'prod',
                '--no-debug' => true,
                'command' => 'doctrine:migrations:migrate',
                '--no-interaction' => true,
                '--configuration' => 'app/DoctrineMigrations/tenant.yml',
                '--club' => $club
            ];

            $commandInput = new ArrayInput($params);

            $commandOutput = new BufferedOutput();

            $logger->notice(sprintf('Running command "%s"', json_encode($params)));

            if($application->run($commandInput, $commandOutput)) {
                $output->writeln("ERROR! Check the logs.");
                $exitCode = -1;
            }

            $logger->debug(sprintf('Command "%s" output:', $params["command"], $commandOutput->fetch()));

            $output->writeln("done.");
        }

        return $exitCode;
    }
}
