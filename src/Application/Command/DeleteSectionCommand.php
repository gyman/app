<?php
namespace Gyman\Application\Command;

use Gyman\Domain\Section\SectionId;

class DeleteSectionCommand
{
    /**
     * @var SectionId
     */
    private $sectionId;

    /**
     * DeleteSectionCommand constructor.
     * @param SectionId $sectionId
     */
    public function __construct(SectionId $sectionId)
    {
        $this->sectionId = $sectionId;
    }

    public function sectionId(): SectionId
    {
        return $this->sectionId;
    }
}