<?php

declare(strict_types=1);

namespace Gyman\Application\Handler;

use Doctrine\Common\Collections\Collection;
use Gyman\Application\Command\UpdateSectionsCommand;
use Gyman\Bundle\AppBundle\Repository\SectionRepository;
use Gyman\Domain\Section;

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
        /** @var Collection|Section[] $existingSections */
        $existingSections = $this->sectionRepository->findAll();

        /** @var Section $existing */
        foreach ($existingSections as $existing) {
            if (!$this->inArray($existing, $command->sections)) {
                $this->sectionRepository->remove($existing);
            }
        }

        /** @var Section $section */
        foreach ($command->sections as $section) {
            $section->calendar()->updateTitle($section->title());
            $this->sectionRepository->insert($section);
        }
    }

    private function inArray(Section $existing, array $sections): bool
    {
        /** @var Section $section */
        foreach ($sections as $section) {
            if ($section->id()->equals($existing->id())) {
                return true;
            }
        }

        return false;
    }
}
