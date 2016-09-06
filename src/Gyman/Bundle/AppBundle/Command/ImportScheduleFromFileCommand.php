<?php
namespace Gyman\Bundle\AppBundle\Command;

use Carbon\Carbon;
use Dende\Calendar\Application\Command\CreateEventCommand;
use Dende\Calendar\Domain\Calendar\Event\EventType;
use Dende\Calendar\Domain\Calendar\Event\Repetitions;
use Gyman\Domain\Section;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
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
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument("file");
        $container = $this->getContainer();

        try {
            $value = Yaml::parse(file_get_contents($file));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }

        $schedule = $value["schedule"];

        $sections = array_unique(call_user_func_array(
            'array_merge',
            array_values(array_map(function($day) {
                return array_keys($day);
            }, $schedule))
        ));

        /** @var array|Section[] $sections */
        $sections = array_combine($sections, array_map(function($title) use ($container) {
            if($section = $container->get("gyman.repository.section")->findOneByTitle($title))
            {
                ;
            } else {
                $calendar = $container->get('gyman.calendar.factory')->createFromArray([
                    'title' => $title
                ]);

                $section = new Section(null, $title, $calendar);
                $container->get("gyman.repository.section")->insert($section);
            }
            return $section;
        }, $sections));

        $startDate = $value["start"];
        $endDate = $value["end"];

        $count = array_sum(array_map(function($dayweek){ return count($dayweek); }, $schedule));

        $progress = new ProgressBar($output, $count);

        foreach($schedule as $dayOfWeek => $activity) {
            foreach($activity as $sectionTitle => $hours) {
                list($startHour, $endHour) = array_values($hours);

                $eventRepetitions = [array_search(strtolower($dayOfWeek), Repetitions::$availableWeekdays)];

                $eventStart = Carbon::parse($startDate)->setTimeFromTimeString($startHour);
                $eventEnd = Carbon::parse($endDate)->setTimeFromTimeString($endHour);

                $eventDuration = $eventStart->diff(
                    Carbon::parse($startDate)->setTimeFromTimeString($endHour)
                )->i;

                $section = $sections[$sectionTitle];
                $calendar = $section->calendar();

                $command = new CreateEventCommand();
                $command->calendar = $calendar;
                $command->duration = $eventDuration;
                $command->startDate = $eventStart;
                $command->endDate = $eventEnd;
                $command->repetitionDays = $eventRepetitions;
                $command->title = $section->title();
                $command->type = EventType::TYPE_WEEKLY;

                $container->get("dende_calendar.handler.create_event")->handle($command);
                $progress->advance();
            }
        }

        $progress->finish();
    }
}
