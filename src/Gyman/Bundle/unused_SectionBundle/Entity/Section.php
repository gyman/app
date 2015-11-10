<?php
namespace Gyman\Bundle\SectionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gyman\Bundle\ClubBundle\Entity\Club;

/**
 * Section
 *
 * @ORM\Table(name="sections")
 * @ORM\Entity
 */
class Section
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Club
     * @ORM\Column(name="club_id", type="integer", nullable=true)
     */
    private $club;

    /**
     * @var Member[]
     * @ORM\ManyToMany(targetEntity="Gyman\Bundle\AppBundle\Entity\Member", inversedBy="sections")
     * @ORM\JoinTable(name="sections_has_members")
     * )
     */
    private $members;

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
     * @param  string  $name
     * @return Section
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
     * @return Club
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param Club $club
     */
    public function setClub(Club $club)
    {
        $this->club = $club;
    }

    /**
     * @return Member[]
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param Member[] $members
     */
    public function setMembers($members)
    {
        $this->members = $members;
    }
}
