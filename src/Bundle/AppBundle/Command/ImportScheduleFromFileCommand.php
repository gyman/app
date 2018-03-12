<?php
namespace Gyman\Bundle\AppBundle\Command;

use Carbon\Carbon;
use Closure;
use DateTime;
use Dende\Calendar\Application\Command\CreateEventCommand;
use Dende\Calendar\Domain\Calendar\CalendarId;
use Dende\Calendar\Domain\Calendar\Event\EventType;
use Dende\Calendar\Domain\Calendar\Event\Repetitions;
use Dende\Calendar\Domain\Repository\EventRepositoryInterface;
use Doctrine\Common\Collections\Criteria;
use Gyman\Bundle\AppBundle\Repository\EventRepository;
use Gyman\Bundle\AppBundle\Repository\OccurrenceRepository;
use Gyman\Domain\Calendar;
use Gyman\Domain\Calendar\Event;
use Gyman\Domain\Section;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class ImportScheduleFromFileCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gyman:calendar:import')
            ->setDescription('Will import schedule from yml file')
            ->addArgument('file', InputArgument::REQUIRED, 'Yaml file to import')
            ->addOption('overwrite', 'o', InputOption::VALUE_NONE, 'clean old event and occurrences from imported starting day')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();

        list($schedule, $startDate, $endDate) = $this->parseFile($input->getArgument("file"));

        if($input->getOption('overwrite')) {
            $this->clearDb($startDate);
        }

        $sections = $this->getSections($schedule);
        $count = array_sum(array_map(function($dayweek){ return count($dayweek); }, $schedule));

        $commandArray = $this->createCommandArray($schedule, $startDate, $endDate, $sections);
        $commandArray = $this->reduceScheduleByRepetitions($commandArray);

        $progress = new ProgressBar($output, $count);

        /** @var CreateEventCommand $command */
        foreach($commandArray as $command) {
            $progress->setMessage($command->title);
            $container->get("dende_calendar.handler.create_event")->handle($command);
            $progress->advance();
        }
        $progress->finish();
    }

    private function parseFile($file)
    {
        try {
            $value = Yaml::parse(file_get_contents($file));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
            exit;
        }

        return [$value["schedule"], $value["start"], $value["end"]];
    }

    private function getSections($schedule)
    {
        $container = $this->getContainer();

        $sections = array_unique(call_user_func_array('array_merge', array_values(array_map(function($day) {
            return array_keys($day);
        }, $schedule))));

        /** @var array|Section[] $sections */
        return array_combine($sections, array_map(function($title) use ($container) {
            if($section = $container->get("gyman.repository.section")->findOneByTitle($title))
            {
                ;
            } else {
                $calendar = new Calendar(CalendarId::create(), $title);
                $container->get("gyman.calendar.repository")->insert($calendar);

                $section = new Section(null, $title, $calendar);
                $container->get("gyman.repository.section")->insert($section);
            }
            return $section;
        }, $sections));
    }

    private function reduceScheduleByRepetitions(array $commandsArray = [])
    {
        $toSave = [];
        $toRemove = [];

        /** @var Closure $md5 */
        $md5 = function(CreateEventCommand $command) {
            return  md5($command->title . $command->startDate->format("H:i") . $command->endDate->format("H:i"));
        };

        /** @var CreateEventCommand $command */
        while($command = array_shift($commandsArray)) {

            /** @var CreateEventCommand $comparedCommand */
            foreach($commandsArray as $comparedCommand) {
                if($md5($command) === $md5($comparedCommand)) {
                    $command->repetitions = array_merge($command->repetitions, $comparedCommand->repetitions);
                    $toRemove[spl_object_hash($comparedCommand)] = $comparedCommand;
                }
            }

            unset($comparedCommand);

            if(!array_key_exists(spl_object_hash($command), $toRemove)) {
                $toSave[] = $command;
            }
        }

        unset($commandsArray, $command, $toRemove, $md5);

        return $toSave;
    }

    private function createCommandArray(array $schedule = [], $startDate, $endDate, array $sections = [])
    {
        /** @var CreateEventCommand[]|array $commandArray */
        $commandArray = [];

        foreach($schedule as $dayOfWeek => &$activity) {
            foreach($activity as $sectionTitle => $hours) {
                list($startHour, $endHour) = array_values($hours);

                $eventRepetitions = [array_search(strtolower($dayOfWeek), Repetitions::$availableWeekdays)];

                $eventStart = Carbon::parse($startDate)->setTimeFromTimeString($startHour);
                $eventEnd = Carbon::parse($endDate)->setTimeFromTimeString($endHour);

                /** @var Section $section */
                $section = $sections[$sectionTitle];
                $calendar = $section->calendar();

                $commandArray[] = new CreateEventCommand(
                    $calendar->id()->id(),
                    EventType::TYPE_WEEKLY,
                    $eventStart,
                    $eventEnd,
                    $section->title(),
                    $eventRepetitions
                );
            }
        }

        return $commandArray;
    }

    private function clearDb($startDate = '')
    {
        $startDate = new DateTime($startDate);

        /** @var EventRepository $eventRepository */
        $eventRepository = $this->getContainer()->get('gyman.event.repository');

        /** @var OccurrenceRepository $occurrenceRepository */
        $occurrenceRepository = $this->getContainer()->get('gyman.occurrence.repository');

        $eventCriteria = new Criteria();
        $eventCriteria->where(
            $eventCriteria->expr()->gt('endDate', $startDate)
        );

        $occurrencesCriteria = new Criteria();
        $occurrencesCriteria->where(
            $occurrencesCriteria->expr()->gt('startDate', $startDate)
        );

        $events = $eventRepository->matching($eventCriteria);
        $occurrences = $occurrenceRepository->matching($occurrencesCriteria);

        $occurrenceRepository->remove($occurrences);

        $events->map(function(Event $event) use ($startDate) {
            if($event->endDate() > $startDate) {
                $event->changeEndDate($startDate);
            }
        });

        $this->getContainer()->get('doctrine.orm.tenant_entity_manager')->flush();
    }
}