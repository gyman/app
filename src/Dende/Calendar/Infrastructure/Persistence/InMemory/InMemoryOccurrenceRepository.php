<?php
namespace Dende\Calendar\Infrastructure\Persistence\InMemory;

use Dende\Calendar\Domain\Calendar;
use Dende\Calendar\Domain\Calendar\Event\Occurrence;
use Dende\Calendar\Domain\Repository\OccurrenceRepositoryInterface;
use Dende\Calendar\Domain\Repository\Specification\InMemoryOccurrenceSpecificationInterface;
use Dende\Calendar\Infrastructure\Persistence\InMemory\Specification\InMemoryOccurrenceByDateAndCalendarSpecification;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class InMemoryOccurrenceRepository
 * @package Gyman\Domain\Repository
 */
class InMemoryOccurrenceRepository implements OccurrenceRepositoryInterface
{
    /**
     * @var Occurrence[]
     */
    private $occurrences = [];

    /**
     * @return Occurrence[]
     */
    public function findAll()
    {
        return $this->occurrences;
    }

    /**
     * @param Occurrence $occurrence
     * @return null
     */
    public function insert($occurrence)
    {
        $this->occurrences[] = $occurrence;
    }

    /**
     * @param $event
     * @return ArrayCollection|Occurrence[]
     */
    public function findAllByEvent($event)
    {
//        return (new ArrayCollection($this->occurrences))
//            ->filter(function (Occurrence $occurrence) use ($event) {
//                return $occurrence->event() === $event;
//            });
    }

    /**
     * @param InMemoryOccurrenceSpecificationInterface $specification
     * @return ArrayCollection|Occurrence[]
     */
    public function query(InMemoryOccurrenceSpecificationInterface $specification)
    {
        $result = $this->filterOccurrences(
            function (Occurrence $occurrence) use ($specification) {
                return $specification->specifies($occurrence);
            }
        );

        return new ArrayCollection($result);
    }

    private function filterOccurrences(callable $callback)
    {
        $result = array_values(array_filter($this->occurrences, $callback));

        usort($result, function (Occurrence $a, Occurrence $b) {
            return $a->startDate() < $b->startDate() ? -1 : 1;
        });

        return $result;
    }

    public function findOneByDateAndCalendar(\DateTime $date, Calendar $calendar)
    {
        return $this->query(
            new InMemoryOccurrenceByDateAndCalendarSpecification($date, $calendar)
        );
    }
}
