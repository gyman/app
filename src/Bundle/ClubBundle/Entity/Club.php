<?php

declare(strict_types=1);

namespace Gyman\Bundle\ClubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Section;

/**
 * Club.
 */
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
     * @var ArrayCollection|Section[]
     */
    protected $sections;

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
     * Club constructor.
     *
     * @param int                       $id
     * @param string                    $name
     * @param ArrayCollection|Section[] $sections
     * @param Subdomain                 $subdomain
     * @param Database                  $database
     * @param Details                   $details
     */
    public function __construct($id, $name, $sections, Subdomain $subdomain, Database $database, Details $details)
    {
        $this->id = $id;
        $this->name = $name;
        $this->sections = $sections;
        $this->subdomain = $subdomain;
        $this->database = $database;
        $this->details = $details;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return ArrayCollection|Section[]
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * @return Subdomain
     */
    public function getSubdomain()
    {
        return $this->subdomain;
    }

    /**
     * @return Database
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @return Details
     */
    public function details()
    {
        return $this->details;
    }

    public function setDetails(Details $details)
    {
        $this->details = $details;
    }

    /**
     * @param string $name
     */
    public function updateName($name)
    {
        $this->name = $name;
    }
}
