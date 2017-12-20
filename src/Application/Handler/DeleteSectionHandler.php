<?php
namespace Gyman\Application\Handler;

use Gyman\Application\Command\DeleteSectionCommand;
use Gyman\Bundle\AppBundle\Repository\CalendarRepository;
use Gyman\Bundle\AppBundle\Repository\SectionRepository;
use Gyman\Domain\Section;

class DeleteSectionHandler
{
    /**
     * @var SectionRepository
     */
    private $sectionRepository;

    /**
     * @var CalendarRepository
     */
    private $calendarRepository;

    /**
     * DeleteSectionHandler constructor.
     * @param SectionRepository $sectionRepository
     * @param CalendarRepository $calendarRepository
     */
    public function __construct(SectionRepository $sectionRepository, CalendarRepository $calendarRepository)
    {
        $this->sectionRepository = $sectionRepository;
        $this->calendarRepository = $calendarRepository;
    }

    public function handle(DeleteSectionCommand $command)
    {
        /** @var Section $section */
        $section = $this->sectionRepository->findOneBy(["id" => $command->sectionId()->id()]);
        $this->sectionRepository->delete($section);
        $this->calendarRepository->delete($section->calendar());
    }
}
