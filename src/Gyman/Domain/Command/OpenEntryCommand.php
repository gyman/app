<?php
namespace Gyman\Domain\Command;

use DateTime;
use Dende\Calendar\Domain\Calendar\Event\Occurrence;
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
    public $price = 20;

    /**
     * @var Member
     */
    public $member;

    /**
     * @var Voucher
     */
    public $voucher;

    /**
     * @var Occurrence
     */
    public $occurrence;

    /**
     * CreateVoucherCommand constructor.
     */
    public function __construct(Member $member)
    {
        $this->member = $member;

        $this->entryType = Entry::TYPE_PAID;

        if ($member->hasCurrentVoucher() && $member->currentVoucher()->leftEntriesAmount() > 0) {
            $this->voucher = $member->currentVoucher();
            $this->entryType = Entry::TYPE_VOUCHER;
        } else {
            $this->entryType = Entry::TYPE_CREDIT;
        }

        $this->startDate = new \DateTime('now');
    }
}
