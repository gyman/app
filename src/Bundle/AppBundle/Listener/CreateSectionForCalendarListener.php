<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Listener;

use Dende\CalendarBundle\Event\CalendarAfterCreationEvent;
use Gyman\Bundle\AppBundle\Repository\SectionRepository;
use Gyman\Domain\Section;

/**
 * Class CreateSectionForCalendarListener.
 *
 * @todo move all logic to new service
 */
class CreateSectionForCalendarListener
{
    /**
     * @var SectionRepository
     */
    private $sectionRepository;

    /**
     * CreateSectionForCalendarListener constructor.
     *
     * @param SectionRepository $sectionRepository
     */
    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    /**
     * @param CalendarAfterCreationEvent $event
     */
    public function onCalendarCreate(CalendarAfterCreationEvent $event)
    {
        $section = new Section(
            null,
            $event->calendar->name(),
            $event->calendar
        );

        $this->sectionRepository->insert($section);
    }
}
