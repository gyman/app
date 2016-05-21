<?php
namespace Gyman\Bundle\ClubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
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
    public $involvements;

    /**
     * @string
     */
    public $firstname;

    /**
     * @string
     */
    public $lastname;

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
}
