<?php
namespace Gyman\Bundle\AppBundle\Repository;

use DateTime;
use Dende\CalendarBundle\Repository\ORM\CalendarRepository as BaseCalendarRepository;
use Gyman\Domain\Calendar;

class CalendarRepository extends BaseCalendarRepository
{
    public function delete(Calendar $calendar) : void
    {
        $calendar->setDeletedAt(new DateTime("now"));
        $em = $this->getEntityManager();
        $em->flush($calendar);
    }
}