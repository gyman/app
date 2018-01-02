<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Command;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Calendar;
use Gyman\Domain\Calendar\Event;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TruncateCalendarsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gyman:calendar:truncate_calendars')
            ->setDescription('Will reduce calendars entities and update referencing events and sections')
            ->addOption('dry', 'd', InputOption::VALUE_NONE, 'process data but don\'t save')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $em = $container->get('doctrine.orm.tenant_entity_manager');

        /** @var Calendar[]|ArrayCollection $calendars */
        $calendars = $container->get('gyman.calendar.repository')->findAll();

        $toRemove = [];

        /** @var Calendar $calendar */
        while ($calendar = array_shift($calendars)) {
            $similarCalendars = array_filter($calendars, function (Calendar $compareCalendar) use ($calendar) {
                return strtolower($calendar->name()) === strtolower($compareCalendar->name());
            });

            if (count($similarCalendars) > 0) {
                $toRemove += array_map(function (Calendar $calendar) { return $calendar->id(); }, $similarCalendars);
            } else {
                continue;
            }

            if (!in_array($calendar->id(), $toRemove, true)) {
                /** @var Calendar $similarCalendar */
                foreach ($similarCalendars as $similarCalendar) {
                    $section = $similarCalendar->section();
                    $events = $similarCalendar->events();

                    $eventsIds = array_map(function (Event $event) { return $event->id(); }, $events->toArray());

                    $qb = $em->createQueryBuilder();
                    $q = $qb->update(Event::class, 'e')
                        ->set('e.calendar', ':calendar')
                        ->where('e.id IN (:eventsIds)')
                        ->setParameter('calendar', $calendar)
                        ->setParameter('eventsIds', $eventsIds)
                        ->getQuery();

                    $p = $q->execute();

                    $qb = $em->createQueryBuilder();
                    $q = $qb->delete(Event::class, 'e')
                        ->where('e.id IN (:eventsIds)')
                        ->setParameter('eventsIds', $eventsIds)
                        ->getQuery();

                    $p = $q->execute();
                }
            }
        }
    }
}
