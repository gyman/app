<?php

namespace Gyman\Bundle\LandingPageBundle\Command;

use Exception;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;

class RunCommandOnAllTenantsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gyman:iterate_tenants')
            ->setDescription('Runs command on all tenant databases')
            ->addArgument("command_to_run", InputArgument::REQUIRED)
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

        $output->writeln(sprintf("Running on %d subdomains:", count($clubs)));

        $exitCode = 0;

        die(var_dump($input));

        foreach($clubs as $club) {
            $output->write(sprintf("%s...", $club));

            $application = new Application($kernel);
            $application->setAutoExit(false);

            $params = [

                '--club' => $club
            ];

            $commandInput = new ArrayInput($params);

            $commandOutput = new BufferedOutput();

            $logger->notice(sprintf('Running command "%s"', json_encode($params)));

            $exitCode = $application->run($commandInput, $commandOutput);

            if(0 !== $exitCode) {
                $output->writeln("ERROR! Check the logs.");
                $output->writeln($commandOutput->fetch());
                return $exitCode;
            }

            $logger->debug(sprintf('Command "%s" output:', $params["command"], $commandOutput->fetch()));

            $output->writeln("done.");
        }

        return 0;
    }
}
