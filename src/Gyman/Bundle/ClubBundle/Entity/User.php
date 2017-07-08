<?php
namespace Gyman\Bundle\ClubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\UserInterface;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Class User
 * @package Gyman\Bundle\ClubBundle\Entity
 */
class User extends BaseUser implements UserInterface
{

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->involvements = new ArrayCollection();
    }

    /**
     * @var Involvement[]
     */
    private $involvements;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    public function firstname() : string
    {
        return $this->firstname;
    }

    public function lastname() : string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * @return string
     */
    public function getFoto()
    {
        return '/bundles/gymanapp/images/no-profile.gif';
    }

    /**
     * @param $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getClubs()
    {
        return $this->involvements->filter(function(Involvement $involvement) {
            return $involvement->club;
        });
    }
}
