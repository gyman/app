<?php
namespace Gyman\Bundle\AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DumpHostsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
                ->setName('gyman:dump-hosts')
                ->setDescription('Dumps /etc/hosts file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();

        $clubs = $em->getRepository('ClubBundle:Club')->findAll();

        foreach($clubs as $club) {
            $output->writeln(sprintf(
                "127.0.0.1\t\t%s", $club->getSubdomain()->getName() . "." . $this->getContainer()->getParameter('base_url')
            ));
        }
    }
}
