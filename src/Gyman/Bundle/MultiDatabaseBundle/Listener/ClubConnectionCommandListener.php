<?php

namespace Gyman\Bundle\MultiDatabaseBundle\Listener;

use Doctrine\ORM\EntityRepository;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use Gyman\Bundle\MultiDatabaseBundle\Connection\ConnectionWrapper;
use Gyman\Bundle\MultiDatabaseBundle\Exception\ClubNotFoundException;
use Gyman\Bundle\MultiDatabaseBundle\Services\CredentialsStorage;
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
            $event->getOutput()->writeln(
                sprintf('Performing operation on standard database <info>"gyman"</info>')
            );

            return;
        }

        $input->setOption('em', 'club');
        $command->getDefinition()->getOption('em')->setDefault('club');

        /** @var Club $club */
        $club = $this->clubRepository->findOneBySubdomain(new Subdomain($clubName));

        if (!$club) {
            throw new ClubNotFoundException($clubName);
        }

        $db = $club->getDatabase();

        $this->connectionWrapper->forceSwitch(
            $db->getName(),
            $db->getUsername(),
            $db->getPassword()
        );

        $event->getOutput()->writeln(
            sprintf("Switching to <info>'%s'</info> database as user <info>'%s'</info>", $db->getName(), $db->getUsername())
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
}
