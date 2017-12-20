<?php

namespace Gyman\Application\Handler;


use Dende\Calendar\Domain\Calendar\CalendarId;
use Gyman\Application\Command\CreateSectionCommand;
use Gyman\Bundle\AppBundle\Repository\SectionRepository;
use Gyman\Domain\Calendar;
use Gyman\Domain\Section;
use Gyman\Domain\Section\SectionId;

class CreateSectionHandler
{
    /**
     * @var SectionRepository
     */
    private $sectionRepository;

    /**
     * CreateSectionHandler constructor.
     * @param SectionRepository $sectionRepository
     */
    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function handle(CreateSectionCommand $command)
    {
        $section = new Section(
            SectionId::create(),
            '', //$command->title()
            null,
            null,
            0,
            null
        );

        $calendar = new Calendar(
            CalendarId::create(),
            '', //$command->title(),
            null,
            $section
        );

        $this->sectionRepository->insert($section);
    }
}