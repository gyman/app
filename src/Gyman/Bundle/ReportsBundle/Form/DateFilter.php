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

    public function __construct()
    {
        $this->startDate = new DateTime("now");
        $this->endDate = new DateTime("+1 month");
    }


}