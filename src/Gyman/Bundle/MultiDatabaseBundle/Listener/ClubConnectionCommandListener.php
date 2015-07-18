<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Listener;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

final class ClubConnectionCommandListener
{
    public function onConsoleCommand(ConsoleCommandEvent $event)
    {
        $this->input = $event->getInput();
        $this->output = $event->getOutput();
        $command = $event->getCommand();

        if (!$this->isProperCommand($command)) {
            return;
        }

        $option = new InputOption('club', null, InputOption::VALUE_OPTIONAL, 'Club name (will be converted to slug)', null);

        $command->getApplication()->getDefinition()->addOption($option);
        $command->mergeApplicationDefinition();

//        $t = $command->getDefinition()->getOption('club')->;

        die(var_dump($t));
    }

    private function isProperCommand(Command $command)
    {
        return ($command->getName() === 'doctrine:schema:update');
    }
}
