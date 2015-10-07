<?php
namespace Dende\Calendar\Domain\Repository;

use DateTime;
use Dende\Calendar\Domain\Calendar;
use Dende\Calendar\Domain\Calendar\Event\Occurrence;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface OccurrenceRepositoryInterface
 * @package Gyman\Domain\Repository
 */
interface OccurrenceRepositoryInterface
{
    /**
     * @param $occurrence
     * @return mixed
     */
    public function insert($occurrence);

    /**
     * @param $event
     * @return ArrayCollection|Occurrence[]
     */
    public function findAllByEvent($event);

    /**
     * @param DateTime $date
     * @param Calendar $calendar
     * @return mixed
     */
    public function findOneByDateAndCalendar(DateTime $date, Calendar $calendar);

    public function findAll();
}
