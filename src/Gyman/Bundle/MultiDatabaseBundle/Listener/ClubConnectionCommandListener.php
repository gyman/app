<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Listener;

use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\ORM\EntityRepository;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use Gyman\Bundle\MultiDatabaseBundle\Connection\ConnectionWrapper;
use Gyman\Bundle\MultiDatabaseBundle\Exception\ClubNotFoundException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputOption;

final class ClubConnectionCommandListener
{
    /**
     * @var EntityRepository
     */
    private $clubRepository;

    /**
     * @var ConnectionWrapper
     */
    private $connectionWrapper;

    /**
     * @var AbstractSchemaManager
     */
    private $schemaManager;

    /**
     * @param ConsoleCommandEvent $event
     * @throws ClubNotFoundException
     */
    public function onConsoleCommand(ConsoleCommandEvent $event)
    {
        $command = $event->getCommand();

        if (!$this->isProperCommand($command)) {
            return;
        }

        $command->getApplication()->getDefinition()->addOption(
            new InputOption('club', null, InputOption::VALUE_OPTIONAL, 'Club name slug', null)
        );
        $command->mergeApplicationDefinition();

        $input = new ArgvInput();
        $input->bind($command->getDefinition());
        $clubName = $input->getOption('club');

        if ($clubName === null) {
            $event->getOutput()->write('<error>gyman:</error> ');

            return;
        }

        $input->setOption('em', 'club');
        $command->getDefinition()->getOption('em')->setDefault('club');

        if (!$this->schemaManager->tablesExist(['clubs'])) {
            return;
        }

        /** @var Club $club */
        $club = $this->clubRepository->findOneBySubdomain(new Subdomain($clubName));

        if (!$club) {
            throw new ClubNotFoundException($clubName);
        }

        $db = $club->getDatabase();

//        if (!in_array($db->getName(), $this->schemaManager->listDatabases())) {
//            return;
//        }

        $this->connectionWrapper->forceSwitch(
            $db->getName(),
            $db->getUsername(),
            $db->getPassword()
        );

        $event->getOutput()->writeln(
            sprintf("<error>%s@%s:</error> ", $db->getUsername(), $db->getName())
        );
    }

    /**
     * @param Command $command
     * @return bool
     */
    private function isProperCommand(Command $command)
    {
        return in_array($command->getName(), [
            'doctrine:schema:update',
            'doctrine:schema:create',
            'doctrine:schema:drop',
            'doctrine:fixtures:load',
        ]);
    }

    /**
     * @param EntityRepository $clubRepository
     */
    public function setClubRepository(EntityRepository $clubRepository)
    {
        $this->clubRepository = $clubRepository;
    }

    /**
     * @param ConnectionWrapper $clubConnection
     */
    public function setConnectionWrapper(ConnectionWrapper $clubConnection)
    {
        $this->connectionWrapper = $clubConnection;
    }

    /**
     * @param AbstractSchemaManager $schemaManager
     */
    public function setSchemaManager($schemaManager)
    {
        $this->schemaManager = $schemaManager;
    }
}
