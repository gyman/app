<?php
namespace Gyman\Bundle\ClubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\ClubBundle\Entity\User;

/**
 * Class Involvement
 * @package Gyman\Bundle\ClubBundle\Entity
 */
class Involvement
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var ArrayCollection|User[]
     */
    public $user;

    /**
     * @var ArrayCollection|Club[]
     */
    public $club;

    /**
     * @var array
     */
    public $roles;
}
