<?php
namespace Gyman\Domain\Model;

use DateInterval;
use DateTime;

/**
 * Class Duration
 * @package Gyman\Domain\Model
 */
class Duration
{
    /**
     * @var int
     */
    private $minutes;

    /**
     * Duration constructor.
     * @param int $minutes
     */
    public function __construct($minutes)
    {
        $this->minutes = intval($minutes);
    }

    /**
     * @return \DateTime
     */
    public function createEndDate(DateTime $startDate)
    {
        /** @var DateTime $endDate */
        $endDate = clone($startDate);
        $diff = new \DateInterval(sprintf('PT%dM', abs($this->minutes)));
        $endDate->add($diff);

        return $endDate;
    }
}