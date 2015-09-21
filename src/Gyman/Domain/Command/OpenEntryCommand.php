<?php

namespace Gyman\Domain\Command;

use DateTime;
use Gyman\Domain\Model\Entry;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\Voucher;

/**
 * Class OpenEntryCommand
 * @package Gyman\Domain\Command
 */
final class OpenEntryCommand
{
    /**
     * @var DateTime
     */
    public $startDate;

    /**
     * @var string
     */
    public $entryType;

    /**
     * @var integer
     */
    public $price;

    /**
     * @var Member
     */
    public $member;

    /**
     * @var Voucher
     */
    public $voucher;

    /**
     * CreateVoucherCommand constructor.
     */
    public function __construct(Member $member)
    {
        $this->member = $member;

        $this->entryType = Entry::TYPE_PAID;

        if ($member->hasCurrentVoucher()) {
            $this->voucher = $member->currentVoucher();
            $this->entryType = Entry::TYPE_VOUCHER;
        }

        $this->price = 15;

        $this->startDate = new \DateTime('now');
    }
}
