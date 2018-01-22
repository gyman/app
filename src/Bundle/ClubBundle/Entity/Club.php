<?php
namespace Gyman\Bundle\ClubBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gyman\Domain\Section;

class Club
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Subdomain
     */
    protected $subdomain;

    /**
     * @var Database
     */
    protected $database;

    /**
     * @var Details
     */
    protected $details;

    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @var DateTime
     */
    protected $deletedAt;

    public function __construct(?string $name = null, ?Subdomain $subdomain = null, ?Database $database = null, ?Details $details = null)
    {
        $this->name = $name;
        $this->subdomain = $subdomain;
        $this->database = $database;
        $this->details = $details;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function name() : ?string
    {
        return $this->name;
    }

    public function subdomain() : ?Subdomain
    {
        return $this->subdomain;
    }

    public function database() : ?Database
    {
        return $this->database;
    }

    public function details() : ?Details
    {
        return $this->details;
    }

    public function setDetails(Details $details) : void
    {
        $this->details = $details;
    }

    public function updateName(string $name) : void
    {
        $this->name = $name;
    }

    function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function enable() : void
    {
        $this->enabled = true;
    }

    public function disable() : void
    {
        $this->enabled = false;
    }
}