<?php
namespace Gyman\Domain\Model;
use DateTime;

/**
 * Class Occurence
 * @package Gyman\Domain\Model
 */
class Occurence
{
    /**
     * @var DateTime
     */
    private $startDate;

    /**
     * @var Duration
     */
    private $duration;

    /**
     * @var bool
     */
    private $modified = false;

    /**
     * Occurence constructor.
     * @param DateTime $startDate
     * @param Duration $duration
     */
    public function __construct(DateTime $startDate, Duration $duration)
    {
        $this->startDate = $startDate;
        $this->duration = $duration;
    }

    /**
     * @param Duration $newDuration
     */
    public function resize(Duration $newDuration)
    {
        $this->modified = true;
        $this->duration = $newDuration;
        $this->endDate = $this->duration->createEndDate($this->startDate);
    }

    /**
     * @param DateTime $newStartDate
     */
    public function move(DateTime $newStartDate)
    {
        $this->modified = true;
        $this->endDate = $this->duration->createEndDate($newStartDate);
    }
}