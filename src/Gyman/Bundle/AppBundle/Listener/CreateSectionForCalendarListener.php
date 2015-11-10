<?php
namespace Gyman\Bundle\AppBundle\Listener;

use Dende\CalendarBundle\Event\CalendarAfterCreationEvent;
use Gyman\Bundle\AppBundle\Entity\SectionRepository;
use Gyman\Bundle\AppBundle\Entity\Section;
use Gyman\Domain\Model\Section\SectionId;

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
     * CreateSectionForCalendarListener constructor.
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
            new SectionId('some id'),
            $event->calendar->name(),
            $event->calendar
        );

        $this->sectionRepository->insert($section);
    }
}