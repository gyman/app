<?php

namespace Gyman\Bundle\LandingPageBundle\Command;

use Exception;
use Gyman\Application\Command\CreateClubCommand;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Validator\ConstraintViolation;

class RegisterClubCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gyman:club:create')
            ->setDescription('Setups a new club.')
            ->setHelp('This command allows you to create new clubs')
            ->addArgument('username', InputArgument::OPTIONAL, 'Username used for loging in')
            ->addArgument('email', InputArgument::OPTIONAL, 'Contact email address for user')
            ->addArgument('password', InputArgument::OPTIONAL, 'Password for user')
            ->addArgument('subdomain', InputArgument::OPTIONAL, 'Subdomain for a club')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = CreateClubCommand::createFromInput($input);

        $errors = $this->getContainer()->get('validator')->validate($command, null, ['command']);

        if(0 < $errors->count()) {
            $msg = 'Encountered some errors:' . PHP_EOL;
            /** @var ConstraintViolation $error */
            foreach($errors as $error) {
                $msg.=$error->getMessage() . PHP_EOL;
            }

            throw new Exception($msg);
        }

        $this->getContainer()->get("tactician.commandbus")->handle($command);

        return 0;
    }

    private function getHostname(InputInterface $input, OutputInterface $output)
    {
        if(null === $hostName = $input->getArgument('host')) {
            $choices = array_map(function(Host $host) {
                return $host->getAaaUrl();
            }, $this->getContainer()->get('iron.core.repository.host')->findAll());

            $question = new ChoiceQuestion('Please choose which host to use for customer', $choices);
            $hostName = $this->getHelper('question')->ask($input, $output, $question);
        }

        return $hostName;
    }

    private function getEmail(InputInterface $input, OutputInterface $output)
    {
        if(null === $email = $input->getArgument('email')) {
            $question = new Question('Please enter the email');
            $email = $this->getHelper('question')->ask($input, $output, $question);
        }
        return $email;
    }
}
