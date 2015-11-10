<?php
namespace Gyman\Bundle\AppBundle\Listener;

use Dende\CalendarBundle\Event\CalendarAfterCreationEvent;
use Gyman\Domain\Model\Section;

/**
 * Class CreateSectionForCalendarListener
 * @package Gyman\AppBundle\Listener
 * @todo move all logic to new service
 */
class CreateSectionForCalendarListener
{
    /**
     * @var SectionRepository
     */
    private $sectionRepository;

    /**
     * @param CalendarAfterCreationEvent $event
     */
    public function onCalendarCreate(CalendarAfterCreationEvent $event)
    {
        $section = new Section(
            new Section\SectionId('some id'),
            $event->calendar->name(),
            $event->calendar
        );

        $this->sectionRepository->insert($section);
    }
}