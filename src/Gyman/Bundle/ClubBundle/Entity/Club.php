<?php
namespace Gyman\Bundle\ClubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\AppBundle\Entity\Section;
use Gyman\Bundle\UserBundle\Entity\User;

/**
 * Club
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
     * @var ArrayCollection|User[]
     */
    protected $owners;

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
     * @param int $id
     * @param string $name
     * @param ArrayCollection|\Gyman\Bundle\UserBundle\Entity\User[] $owners
     * @param ArrayCollection|Section[] $sections
     * @param Subdomain $subdomain
     * @param Database $database
     */
    public function __construct($id, $name, $owners, $sections, Subdomain $subdomain, Database $database, Details $details)
    {
        $this->id = $id;
        $this->name = $name;
        $this->owners = $owners;
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
     * @return ArrayCollection|\Gyman\Bundle\UserBundle\Entity\User[]
     */
    public function getOwners()
    {
        return $this->owners;
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
