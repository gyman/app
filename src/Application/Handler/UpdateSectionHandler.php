<?php
namespace Gyman\Application\Handler;

use Gyman\Application\Command\UpdateSectionCommand;
use Gyman\Bundle\AppBundle\Repository\CalendarRepository;
use Gyman\Bundle\AppBundle\Repository\UserRepository;
use Gyman\Bundle\AppBundle\Repository\SectionRepository;
use Gyman\Domain\Section;
use Gyman\Domain\User;

class UpdateSectionHandler
{
    /**
     * @var SectionRepository
     */
    private $sectionRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var CalendarRepository
     */
    private $calendarRepository;

    /**
     * UpdateSectionHandler constructor.
     * @param SectionRepository $sectionRepository
     * @param UserRepository $userRepository
     * @param CalendarRepository $calendarRepository
     */
    public function __construct(SectionRepository $sectionRepository, UserRepository $userRepository, CalendarRepository $calendarRepository)
    {
        $this->sectionRepository = $sectionRepository;
        $this->userRepository = $userRepository;
        $this->calendarRepository = $calendarRepository;
    }

    public function handle(UpdateSectionCommand $command)
    {
        /** @var Section $section */
        $section = $this->sectionRepository->findOneBy(["id" => $command->sectionId()->toString()]);

        if($command->instructorId() !== null) {
            /** @var User $instructor */
            $instructor = $this->userRepository->findOneBy(["id" => $command->instructorId()->toString()]);
        } else {
            $instructor = null;
        }

        $section->setInstructor($instructor);

        $section->setTitle($command->title());
        $section->calendar()->updateTitle($section->title());

        $this->sectionRepository->insert($section);
        $this->calendarRepository->insert($section->calendar());
    }
}
