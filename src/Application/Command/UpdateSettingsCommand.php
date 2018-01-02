<?php

declare(strict_types=1);

namespace Gyman\Application\Command;

use Gyman\Bundle\ClubBundle\Entity\Details;
use Gyman\Domain\Section;
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
