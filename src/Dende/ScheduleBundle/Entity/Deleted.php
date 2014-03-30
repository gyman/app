<?php

namespace Dende\ScheduleBundle\Entity;

use Dende\ScheduleBundle\Entity\Event;
use \DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Dende\ScheduleBundle\Entity\EventRepository")
 */
class Deleted extends EventMeta {

}
