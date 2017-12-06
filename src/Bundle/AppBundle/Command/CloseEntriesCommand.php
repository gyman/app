<?php
namespace Gyman\Bundle\AppBundle\Command;

use Carbon\Carbon;
use Doctrine\ORM\QueryBuilder;
use Gyman\Application\Command\CloseExpiredEntriesCommand;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CloseEntriesCommand extends ContainerAwareCommand
{
    /** @var  Logger */
    private $logger;

    /**
     * @param Logger $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    protected function configure()
    {
        $this
                ->setName('gyman:entries:close_expired')
                ->setDescription('Closes finished entries')
                ->addOption(
                    'em',
                    null,
                    InputOption::VALUE_REQUIRED,
                    'Entity manager name'
                )
                ->addOption("dry")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logger->addInfo(sprintf("Looking for expired entries in '%s' database", $input->getOption("club")));

        $command = new CloseExpiredEntriesCommand();
        $this->getContainer()->get("tactician.commandbus")->handle($command);
        $data = $this->getContainer()->get("gyman.app.handler.close_expired_entries")->lastUpdatedData;

        $output->writeln(sprintf("Updated %d members:", count($data)));

        /** @var Member $member */
        foreach($data as $member) {
            $msg = sprintf("Closed last entry for member %s.", $member->email());
            $output->writeln($msg);
            $this->logger->addInfo($msg);
        }
    }
}
