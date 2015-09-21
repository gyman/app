<?php

namespace Gyman\Domain\Command;

use Gyman\Bundle\AppBundle\Entity\Member;

/**
 * Class CreateVoucherCommand
 * @package Gyman\Domain\Command
 */
class CreateVoucherCommand implements VoucherCommandInterface
{
    /**
     * @var \DateTime
     */
    public $startDate;

    /**
     * @var \DateTime
     */
    public $endDate;

    /**
     * @var integer
     */
    public $maximumAmount;

    /**
     * @var string
     */
    public $price;

    /**
     * @var Member
     */
    public $member;

    /**
     * CreateVoucherCommand constructor.
     */
    public function __construct()
    {
        $this->startDate = new \DateTime('now');
        $this->endDate = new \DateTime('+1 month');
    }
}
