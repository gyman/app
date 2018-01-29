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

            ->addOption("skip-errors")
            ->addOption("print-errors")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $kernel = $this->getContainer()->get("kernel");
        $logger = $this->getContainer()->get("logger");

        $clubs = $this->getContainer()->get("gyman.club.repository")->findAll();

        $clubs = array_map(function(Club $club){
            return $club->subdomain()->name();
        }, $clubs);

        $output->writeln(sprintf("Migrating %d subdomains:", count($clubs)));

        $exitCode = 0;

        $verboseErrors = [];

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
                '--club' => $club,
                '--verbose' => false
            ];

            $commandInput = new ArrayInput($params);

            $commandOutput = new BufferedOutput();

            $logger->notice(sprintf('Running command "%s"', json_encode($params)));

            $exitCode = $application->run($commandInput, $commandOutput);

            if($input->hasOption("skip-errors")) {
                $output->writeln("ERROR! skipped");

                $verboseErrors[$club] = $commandOutput->fetch();

            } else {
                if(0 !== $exitCode) {
                    $output->writeln("ERROR! Check the logs.");
                    $output->writeln($commandOutput->fetch());
                    return $exitCode;
                }
            }

            $logger->debug(sprintf('Command "%s" output:', $params["command"], $commandOutput->fetch()));

            $output->writeln("done.");
        }

        if($input->hasOption("print-errors")) {
            $output->writeln("");

            foreach($verboseErrors as $club => $error) {
                $output->writeln("Errors on '".$club."'':");
                $output->writeln($error);
            }
        }

        return 0;
    }
}
