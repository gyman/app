<?php
namespace Gyman\Domain\Command;

use Gyman\Bundle\AppBundle\Entity\Section;
use Gyman\Bundle\ClubBundle\Entity\Details;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UpdateSettingsCommand
{
    /**
     * @var string
     */
    public $subdomain;

    /**
     * @var string
     */
    public $name;

    /**
     * @var UploadedFile
     */
    public $uploadLogo;

    /**
     * @var Details
     */
    public $details;

    /**
     * @var Section[]
     */
    public $sections;
}
