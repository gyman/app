<?php
namespace Gyman\Bundle\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Component\CoreDomain\Model\UserInterface;

/**
 * @ORM\Entity(repositoryClass="Gyman\Bundle\UserBundle\Entity\UserRepository")
 * @ORM\Table(name="users")
 */
class User extends BaseUser implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();

        $this->groups = new ArrayCollection();
        $this->clubs = new ArrayCollection();
    }

    /**
     * @ORM\ManyToMany(targetEntity="Gyman\Bundle\UserBundle\Entity\Group")
     * @ORM\JoinTable(name="users_has_groups",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @var Club[]
     * @ORM\ManyToMany(targetEntity="Gyman\Bundle\ClubBundle\Entity\Club", inversedBy="owners")
     * @ORM\JoinTable(name="users_has_clubs")
     * )
     */
    protected $clubs;

    /**
     * @var Club
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\ClubBundle\Entity\Club")
     * @ORM\JoinColumn(name="current_club_id", referencedColumnName="id", onDelete="SET NULL", nullable=true)
     */
    protected $currentClub;

    /**
     * @ORM\Column(type="string")
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string")
     */
    protected $lastname;

    /**
     * @return mixed
     */
    public function getClubs()
    {
        return $this->clubs;
    }

    /**
     * @param mixed $clubs
     */
    public function setClubs(ArrayCollection $clubs)
    {
        $this->clubs = $clubs;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param mixed $groups
     */
    public function setGroups(ArrayCollection $groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getFullname()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getFoto()
    {
        return '/bundles/default/images/no-profile.gif';
    }

    /**
     * @return Club|null
     */
    public function getCurrentClub()
    {
        return $this->currentClub;
    }

    /**
     * @param Club|null $currentClub
     */
    public function setCurrentClub($currentClub)
    {
        $this->currentClub = $currentClub;
    }
}
