<?php
namespace Gyman\Domain\Command;

use Gyman\Bundle\AppBundle\Entity\Section;
use Gyman\Bundle\ClubBundle\Entity\Details;

class UpdateSettingsCommand
{
    /**
     * @var string
     */
    public $subdomain;

    /**
     * @var Details
     */
    public $details;

    /**
     * @var Section[]
     */
    public $sections;
}
