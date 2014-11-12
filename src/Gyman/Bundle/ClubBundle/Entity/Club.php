<?php

namespace Gyman\Bundle\ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\UserBundle\Entity\User;

/**
 * Club
 *
 * @ORM\Table(name="clubs")
 * @ORM\Entity
 */
class Club
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\ManyToMany(targetEntity="Gyman\Bundle\UserBundle\Entity\User", mappedBy="clubs")
     */
    protected $owners;

    /**
     * @var string
     *
     * @ORM\Column(name="subdomain", type="string", length=255)
     */
    protected $subdomain;

    /**
     * @var array
     *
     * array with database configuration
     *
     * @ORM\Column(name="database_config", type="json_array")
     */
    protected $database;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param  string $name
     * @return Club
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set owner
     *
     * @param  \stdClass $owner
     * @return Club
     */
    public function setOwners(ArrayCollection $owner)
    {
        $this->owners = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \stdClass
     */
    public function getOwners()
    {
        return $this->owners;
    }

    /**
     * Set sections
     *
     * @param  \stdClass $sections
     * @return Club
     */
    public function setSections(ArrayCollection $sections)
    {
        $this->sections = $sections;

        return $this;
    }

    /**
     * Get sections
     *
     * @return Section[]
     */
    public function getSections()
    {
        return $this->sections;
    }

    public function __construct()
    {
        $this->owners = new ArrayCollection();
        $this->sections = new ArrayCollection();
        $this->database = array();
    }

    /**
     * @return array
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @param array $database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
    }

    /**
     * @return mixed
     */
    public function getSubdomain()
    {
        return $this->subdomain;
    }

    /**
     * @param mixed $subdomain
     */
    public function setSubdomain($subdomain)
    {
        $this->subdomain = $subdomain;
    }
}
