<?php

namespace Dende\ScheduleBundle\Entity;

use Dende\ScheduleBundle\Entity\Event;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Dende\ScheduleBundle\Entity\EventRepository")
 */
class SingleEvent extends Event {

}
