<?php

declare(strict_types=1);

namespace Gyman\Bundle\ReportsBundle\Form;

use DateTime;

/**
 * Class DateFilter.
 */
class DateFilter
{
    /** @var \DateTime */
    public $startDate;

    /** @var \DateTime */
    public $endDate;

    /** @var string */
    public $strategy;

    /**
     * DateFilter constructor.
     *
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @param $strategy
     */
    public function __construct(DateTime $startDate, DateTime $endDate, $strategy)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->strategy = $strategy;
    }
}
