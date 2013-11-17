<?php

namespace Gyman\Bundle\ScheduleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Gyman\Bundle\ScheduleBundle\Entity\EventRepository")
 * @codeCoverageIgnore
 */
class Single extends Event
{
    protected $type = "single";
}
