<?php

declare(strict_types=1);

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
