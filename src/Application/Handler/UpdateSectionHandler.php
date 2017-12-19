<?php
namespace Gyman\Application\Handler;

use Doctrine\Common\Collections\Collection;
use Gyman\Application\Command\UpdateSectionsCommand;
use Gyman\Domain\Calendar;
use Gyman\Bundle\AppBundle\Repository\SectionRepository;
use Gyman\Domain\Section;

class UpdateSectionHandler
{
    /**
     * @var SectionRepository
     */
    private $sectionRepository;

    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function handle(UpdateSectionCommand $command)
    {
        /** @var Section $section */
        $section = $this->sectionRepository->findOneBy(["id" => $command->sectionId]);

//        $section->setTitle();
//        $section->setInstructor();

        $section->calendar()->updateTitle($section->title());
        $this->sectionRepository->insert($section);
    }

    private function inArray(Section $existing, array $sections) : bool
    {
        /** @var Section $section */
        foreach($sections as $section) {
            if($section->id()->equals($existing->id())) {
                return true;
            }
        }

        return false;
    }
}
