<?php

namespace Gyman\Bundle\MembersBundle\Event;

use Gyman\Bundle\ClubBundle\Entity\Club;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ClubCreatedEvent
 * @package Gyman\Bundle\ClubBundle\Event
 */
class ClubCreatedEvent extends Event
{
    /**
     * @var Club
     */
    protected $club;

    function __construct($club)
    {
        $this->club = $club;
    }

    /**
     * @return Club
     */
    public function getClub()
    {
        return $this->club;
    }
}

