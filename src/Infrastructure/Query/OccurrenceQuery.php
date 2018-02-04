<?php
namespace Gyman\Infrastructure\Query;

use Carbon\Carbon;
use DateTime;
use Dende\Calendar\Application\Repository\OccurrenceRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gyman\Application\Query\OccurrenceQueryInterface;
use Gyman\Domain\Calendar\Event\Occurrence;

class OccurrenceQuery implements OccurrenceQueryInterface
{
    /**
     * @var OccurrenceRepositoryInterface
     */
    private $repository;

    /**
     * OccurrenceQuery constructor.
     * @param OccurrenceRepositoryInterface $repository
     */
    public function __construct(OccurrenceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getOccurrencesForDay(DateTime $date) : Collection
    {
        /** @var Carbon $startDate */
        $startDate = Carbon::instance($date)->setTime(0, 0, 0);

        /** @var Carbon $endDate */
        $endDate = Carbon::instance($date)->setTime(0, 0, 0)->addDays(1);

        /** @var Occurrence[] $occurrences */
        $occurrences = $this->repository->findByPeriod($startDate, $endDate);

        return new ArrayCollection($occurrences);
    }
}