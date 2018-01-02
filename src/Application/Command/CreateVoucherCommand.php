<?php

declare(strict_types=1);

namespace Gyman\Application\Command;

use Gyman\Domain\Member;

/**
 * Class CreateVoucherCommand.
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
     * @var int
     */
    public $maximumAmount = 10;

    /**
     * @var float
     */
    public $price = 120.00;

    /**
     * @var Member
     */
    public $member;

    /**
     * @var array
     */
    public $creditEntries;

    /**
     * CreateVoucherCommand constructor.
     */
    public function __construct()
    {
        $this->startDate = new \DateTime('now');
        $this->endDate = new \DateTime('+1 month');
    }
}
