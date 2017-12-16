<?php
namespace Gyman\Bundle\AppBundle\Command;

use Carbon\Carbon;
use Closure;
use DateTime;
use Doctrine\ORM\QueryBuilder;
use Gyman\Application\Command\CloseExpiredEntriesCommand;
use Gyman\Application\Event\EntryClosed;
use Gyman\Domain\Calendar\Event\Occurrence;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Ramsey\Uuid\UuidInterface;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CloseEntriesCommand extends ContainerAwareCommand
{
    /** @var  Logger */
    private $logger;

    /** @var EventDispatcherInterface */
    private $eventDispatcher;

    public function __construct(Logger $logger, EventDispatcherInterface $eventDispatcher)
    {
        parent::__construct();

        $this->logger = $logger;
        $this->eventDispatcher = $eventDispatcher;
    }

    protected function configure() : void
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
            ->addOption("dry", null, InputOption::VALUE_NONE)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $this->logger->addInfo(sprintf("Looking for expired entries in '%s' database", $input->getOption("club")));

        $unclosedEntries = $this->getContainer()->get("gyman.entries.repository")->findBy(["endDate" => null]);

        $entryIds = [];
        $callbacks = [];

        /** @var Entry $entry */
        foreach($unclosedEntries as $entry) {
            if($entry->occurrence() instanceof Occurrence) {
                if($entry->occurrence()->isPast()) {
                    if($entry->member()->lastEntry() === $entry) {
                        $callbacks[] = function() use ($entry) { $entry->member()->exitLastEntry(); };
                    } else {
                        $callbacks[] = function() use ($entry) { $entry->closeEntry(new DateTime("now")); };
                    }
                } else {
                    continue; // skip entry as it is ongoing!
                }
            } else {
                $callbacks[] = function() use ($entry) { $entry->closeEntry(new DateTime("now")); };
            }

            $entryIds[] = $entry->id();
        }

        if($input->getOption("dry") === false) {

            $entityManager = $this->getContainer()->get("doctrine.orm.tenant_entity_manager");
            $counter = 0;

            /** @var Closure $callback */
            foreach($callbacks as $callback) {
                $callback->call($this);

                $counter++;

                if($counter > 100) {
                    $entityManager->flush();
                    $counter = 0;
                }
            }

            $entityManager->flush();
        }

        $output->writeln(sprintf("Updated %d entries:", count($entryIds)));

        /** @var UuidInterface $entryId */
        foreach($entryIds as $entryId) {
            $msg = sprintf("Closed entry#%s.", $entryId->toString());
            $output->writeln($msg);

            if($input->getOption("dry") === false) {
                $this->logger->addInfo($msg);
                $this->eventDispatcher->dispatch(EntryClosed::NAME, new EntryClosed($entryId));
            }
        }

        return 0;
    }
}
