<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Command;

use Mockery\CountValidator\Exception;
use Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class GenerateSchedulePdfCommand extends ContainerAwareCommand
{
    /** @var Logger */
    private $logger;

    /**
     * @param mixed $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    protected function configure()
    {
        $this
            ->setName('gyman:calendar:pdf')
            ->setDescription('Will generate pdf schedule for choosen club in configured directory')
            ->addOption('club', 'c', InputOption::VALUE_REQUIRED, 'Club name to generate schedule for')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $config = $this->getContainer()->getParameter('gyman_app.config');

        $clubRepository = $this->getContainer()->get('gyman.club.repository');

        $club = $clubRepository->findOneBySubdomain($input->getOption('club'));

        if (!$club) {
            throw new Exception('Club not found!');
        }

        $directory = $path = implode(DIRECTORY_SEPARATOR, [
                $config['schedule_generator']['destination_directory'],
                $club->getSubdomain()->getName(),
            ]
        );

        if (!file_exists($directory) || !is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $path = implode(DIRECTORY_SEPARATOR, [
                realpath($directory),
                $config['schedule_generator']['filename'],
            ]
        );

        $url = 'http://rio.gyman.vagrant/current-schedule';

        $command = sprintf(
            '%s %s %s %s 1200px*800px 1',
            realpath($config['schedule_generator']['phantom_path']),
            realpath($config['schedule_generator']['rasterize_script_path']),
            $url,
            $path
        );

        $process = (new Process($command, __DIR__))->setTimeout(30)->mustRun();
    }
}
