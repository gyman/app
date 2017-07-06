<?php
namespace Gyman\Application\Handler;

use Gyman\Application\Command\UpdateSectionsCommand;
use Gyman\Domain\Calendar;
use Gyman\Bundle\AppBundle\Repository\SectionRepository;

class UpdateSectionsHandler
{
    /**
     * @var SectionRepository
     */
    private $sectionRepository;

    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function handle(UpdateSectionsCommand $command)
    {
        $existingSections = $this->sectionRepository->findAll();

        foreach ($existingSections as $existing) {
            if (!in_array($existing, $command->sections)) {
                $this->sectionRepository->remove($existing);
            }
        }

        foreach ($command->sections as $section) {
                $section->calendar()->updateTitle($section->title());
                $this->sectionRepository->insert($section);
        }
    }
}
