<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Command;

use Carbon\Carbon;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;
use Gyman\Application\Command\OpenEntryCommand as AppOpenEntryCommand;
use Gyman\Domain\Calendar\Event\Occurrence;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Validator\Constraints\DateValidator;

class OpenEntryCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gyman:entries:open')
            ->setDescription('Opens an new entry')
            ->addOption('em', null, InputOption::VALUE_REQUIRED, 'Entity manager name')
            ->addOption('dry')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $stringFormat = '%s %s [%s]';
        $price = null;
        $voucher = null;

        $members = array_map(function (array $member = []) use ($stringFormat) {
            return sprintf($stringFormat, $member['details.lastname'], $member['details.firstname'], $member['id']);
        }, $this->getContainer()->get('gyman.members.repository')->getAllNamesForAutocompletion());

        $question = new Question('Please choose user by name: ', null);
        $question->setAutocompleterValues($members);
        $memberName = $helper->ask($input, $output, $question);

        $result = [];
        if (!preg_match('@\[([a-z0-9\-]+)\]@ui', $memberName, $result)) {
            throw new Exception("Can't match member id");
        }

        /** @var Member $member */
        $member = $this->getContainer()->get('gyman.members.repository')->findOneById($result[1]);

        $defaultDate = (new DateTime('now'))->format('Y-m-d');

        do {
            $question = new Question(
                sprintf('Please input date of entrance (YYYY-MM-DD) [%s]: ', $defaultDate),
                $defaultDate
            );
            $entranceDateString = $helper->ask($input, $output, $question);

            if (!preg_match(DateValidator::PATTERN, $entranceDateString, $matches)) {
                $output->writeln('<error>Wrong format!</error>');
                continue;
            }

            if (!DateValidator::checkDate($matches[1], $matches[2], $matches[3])) {
                $output->writeln('<error>Wrong date!</error>');
                continue;
            }

            /** @var Occurrence[]|array|ArrayCollection $occurrences */
            $occurrences = $this->getContainer()->get('gyman.occurrence.repository')->findByPeriod(
                Carbon::parse($entranceDateString)->setTimeFromTimeString('00:00:00'),
                Carbon::parse($entranceDateString)->setTimeFromTimeString('23:59:59')
            );

            if (0 === count($occurrences)) {
                $output->writeln('<error>No occurrences found!</error>');
                continue;
            }

            break;
        } while (true);

        $occurrencesList = array_map(function (Occurrence $occurrence) {
            $name = $occurrence->event()->title();
            $start = $occurrence->startDate()->format('H:i');
            $end = $occurrence->endDate()->format('H:i');

            return sprintf("%-20.s \t (%s-%s) [%s]", $name, $start, $end, $occurrence->id());
        }, $occurrences);

        $question = new ChoiceQuestion('Please choose activity: ', $occurrencesList, 0);
        $occurrenceString = $helper->ask($input, $output, $question);

        $result = [];
        if (!preg_match('@\[([a-z0-9\-]+)\]@ui', $occurrenceString, $result)) {
            throw new Exception("Can't match occurrence id");
        }

        /** @var Occurrence $occurrence */
        $occurrence = $this->getContainer()->get('gyman.occurrence.repository')->findOneById($result[1]);

        $typesList = Entry::$availableTypes;

        if ($member->hasCurrentVoucher()) {
            $typesList = array_filter($typesList, function ($type) {
                return Entry::TYPE_CREDIT !== $type;
            });
        } else {
            $typesList = array_filter($typesList, function ($type) {
                return Entry::TYPE_VOUCHER !== $type;
            });
        }

        $question = new ChoiceQuestion('Please choose entry type: ', $typesList, 0);
        $type = $helper->ask($input, $output, $question);

        if (Entry::TYPE_PAID === $type) {
            do {
                $question = new Question('Please give price: ', '15.00');
                $price = $helper->ask($input, $output, $question);

                $price = (float) $price;

                if (0 === $price) {
                    $output->writeln('<error>Price must be float format, greater than 0.0!</error>');
                    continue;
                }

                break;
            } while (true);
        } elseif (Entry::TYPE_VOUCHER === $type) {
            $voucher = $member->currentVoucher();
        }

        if (!$input->getOption('dry')) {
            $command = new AppOpenEntryCommand($member);
            $command->startDate = new DateTime($entranceDateString);
            $command->entryType = $type;
            $command->occurrence = $occurrence;
            $command->price = $price;
            $command->voucher = $voucher;

            $this->getContainer()->get('tactician.commandbus')->handle($command);
            $output->writeln('<info>Entry added</info>');
        } else {
            $output->writeln('<error>Entry not added due to --dry option</error>');
        }

        $output->writeln(sprintf('Member:     %s', $member->details()->fullName()));
        $output->writeln(sprintf('Entry date: %s', $entranceDateString));
        $output->writeln(sprintf('Type:       %s', $type));
        $output->writeln(sprintf('Event:      %s', $occurrence->event()->title()));

        if (null !== $price) {
            $output->writeln(sprintf('Price:      %s', $price));
        }

        if (Entry::TYPE_VOUCHER === $type) {
            $output->writeln(sprintf('Voucher:    %s', $voucher->id()));
        }
    }
}
