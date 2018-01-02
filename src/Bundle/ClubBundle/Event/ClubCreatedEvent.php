<?php

declare(strict_types=1);

namespace Gyman\Bundle\ClubBundle\Event;

use Gyman\Bundle\ClubBundle\Entity\Club;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ClubCreatedEvent.
 */
class ClubCreatedEvent extends Event
{
    /**
     * @var Club
     */
    protected $club;

    public function __construct($club)
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
