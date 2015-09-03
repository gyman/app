<?php
namespace Gyman\Bundle\ClubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\SectionBundle\Entity\Section;
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
     * Club constructor.
     * @param int $id
     * @param string $name
     * @param ArrayCollection|\Gyman\Bundle\UserBundle\Entity\User[] $owners
     * @param ArrayCollection|\Gyman\Bundle\SectionBundle\Entity\Section[] $sections
     * @param Subdomain $subdomain
     * @param Database $database
     */
    public function __construct($id, $name, $owners, $sections, Subdomain $subdomain, Database $database)
    {
        $this->id = $id;
        $this->name = $name;
        $this->owners = $owners;
        $this->sections = $sections;
        $this->subdomain = $subdomain;
        $this->database = $database;
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
     * @return ArrayCollection|\Gyman\Bundle\SectionBundle\Entity\Section[]
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
}
