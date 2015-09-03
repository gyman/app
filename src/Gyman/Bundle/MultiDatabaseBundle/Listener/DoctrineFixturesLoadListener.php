<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Listener;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Input\ArgvInput;

final class DoctrineFixturesLoadListener
{
    /**
     * @var array
     */
    private $options;

    /**
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    public function onConsoleCommand(ConsoleCommandEvent $event)
    {
        $command = $event->getCommand();

        if (!$this->isProperCommand($command)) {
            return;
        }

        $input = new ArgvInput();
        $input->bind($command->getDefinition());
        $clubName = $input->getOption('club');

        if ($clubName === null) {
            $event->getOutput()->writeln(sprintf('Using <info>standard</info> fixtures: <info>%s</info>', implode(',', $this->options['default'])));
            $command->getDefinition()->getOption('fixtures')->setDefault($this->options['default']);
        } else {
            $event->getOutput()->writeln(sprintf('Using <info>custom</info> fixtures: <info>%s</info>', implode(',', $this->options['club'])));
            $command->getDefinition()->getOption('fixtures')->setDefault($this->options['club']);
            $command->getDefinition()->getOption('em')->setDefault('club');
        }
    }

    /**
     * @param Command $command
     * @return bool
     */
    private function isProperCommand(Command $command)
    {
        return in_array($command->getName(), [
            'doctrine:fixtures:load',
        ]);
    }
}
