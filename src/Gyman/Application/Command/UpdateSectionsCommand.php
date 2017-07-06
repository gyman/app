<?php
namespace Gyman\Application\Command;

use Doctrine\Common\Collections\Collection;
use Gyman\Domain\Section;

class UpdateSectionsCommand
{
    /**
     * @var Section[]|Collection
     */
    public $sections;
}
