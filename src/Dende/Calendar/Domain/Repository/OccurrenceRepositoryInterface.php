<?php
namespace Dende\Calendar\Domain\Repository;

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

    public function findAllByDay($date);

    public function findAllByWeek($date);

    public function findAllByMonth($date);
}
