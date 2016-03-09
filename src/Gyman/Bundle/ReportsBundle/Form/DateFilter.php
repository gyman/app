<?php
namespace Gyman\Bundle\ReportsBundle\Form;

use DateTime;

/**
 * Class DateFilter
 * @package Gyman\Bundle\ReportsBundle\Form
 */
class DateFilter
{
    /** @var  \DateTime */
    public $startDate;

    /** @var  \DateTime */
    public $endDate;

    /**
     * DateFilter constructor.
     * @param DateTime $startDate
     * @param DateTime $endDate
     */
    public function __construct(DateTime $startDate, DateTime $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
}
