<?php

namespace Dende\ScheduleBundle\Entity;

use Dende\ScheduleBundle\Entity\IncycleEvent;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="Dende\ScheduleBundle\Entity\EventRepository")
 */
class HiddenEvent extends IncycleEvent {
    
}
