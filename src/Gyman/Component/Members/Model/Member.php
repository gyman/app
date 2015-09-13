<?php
namespace Gyman\Component\Members\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Component\Members\Exception\MemberHasNoLastEntryException;
use Gyman\Component\Vouchers\Exception\LastEntryIsStillOpenedException;
use Gyman\Component\Vouchers\Exception\NoCurrentVoucherForVoucherEntryException;
use Gyman\Component\Vouchers\Exception\VouchersAreOverlappingException;
use Gyman\Component\Vouchers\Model\Entry;
use Gyman\Component\Vouchers\Model\Section;
use Gyman\Component\Vouchers\Model\Voucher;

/**
 * Class Member
 * @package Gyman\Component\Members
 */
class Member
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var EmailAddress
     */
    protected $email;

    /**
     * @var Details
     */
    protected $details;

    /**
     * @var ArrayCollection|Section[] // remove this
     */
    protected $sections;

    /**
     * @var ArrayCollection|Voucher[]
     */
    protected $vouchers;

    /**
     * @var Voucher
     */
    protected $currentVoucher;

    /**
     * @var Entry
     */
    protected $lastEntry;

    /**
     * @var ArrayCollection|Entry[]
     */
    protected $entries;

    /**
     * @param EmailAddress $email
     * @param Details $details
     * @param $sections
     * @param $vouchers
     * @param $entries
     * @param Voucher $currentVoucher
     * @param Entry $lastEntry
     */
    public function __construct(EmailAddress $email, Details $details, ArrayCollection $sections, ArrayCollection $vouchers, $entries = [], $currentVoucher = null, $lastEntry = null)
    {
        $this->email = $email;
        $this->details = $details;

        $this->sections = empty($sections) ? new ArrayCollection() : $sections; // remove this
        $this->vouchers = empty($vouchers) ? new ArrayCollection() : $vouchers;
        $this->entries = empty($entries) ? new ArrayCollection() : $entries;

        $this->currentVoucher = $currentVoucher;
        $this->lastEntry = $lastEntry;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return EmailAddress
     */
    public function email()
    {
        return $this->email;
    }

    /**
     * @return Details
     */
    public function details()
    {
        return $this->details;
    }

    /**
     * @return ArrayCollection|Section[]
     */
    public function sections()
    {
        return $this->sections;
    }

    /**
     * @return ArrayCollection|Voucher[]
     */
    public function vouchers()
    {
        return $this->vouchers;
    }

    /**
     * @return ArrayCollection|Entry[]
     */
    public function entries()
    {
        return $this->entries;
    }

    /**
     * @return Entry|null
     */
    public function lastEntry()
    {
        return $this->lastEntry;
    }

    /**
     * @param $newVoucher
     */
    public function addVoucher(Voucher $newVoucher)
    {
        if (!$this->vouchers instanceof ArrayCollection) {
            $this->vouchers = new ArrayCollection();
        }

        if (!$this->vouchers()->isEmpty()) {
            foreach ($this->vouchers() as $existingVoucher) {
                if ($existingVoucher->overlaps($newVoucher)) {
                    throw new VouchersAreOverlappingException($this, $existingVoucher, $newVoucher);
                }
            }
        }

        $this->vouchers->add($newVoucher);
        $this->updateCurrentVoucher();
    }

    /**
     * @return Voucher
     */
    public function currentVoucher()
    {
        return $this->currentVoucher;
    }

    /**
     * @return bool
     */
    public function hasCurrentVoucher()
    {
        return !is_null($this->currentVoucher());
    }

    /**
     * @param Entry $entry
     */
    public function enter(Entry $entry)
    {
        if ($this->hasLastEntry() && $this->lastEntry()->isOpened()) {
            throw new LastEntryIsStillOpenedException();
        }

        if (!$this->hasCurrentVoucher() && $entry->isType(Entry::TYPE_VOUCHER)) {
            throw new NoCurrentVoucherForVoucherEntryException();
        }

        $this->lastEntry = $entry;
        $this->entries->add($entry);

        if ($this->hasCurrentVoucher() && $entry->isType(Entry::TYPE_VOUCHER)) {
            $this->currentVoucher->addEntry($entry);
        }
    }

    public function exitLastEntry()
    {
        if ($this->hasLastEntry() && $this->lastEntry()->isOpened()) {
            $this->lastEntry()->closeEntry(new \DateTime());
        }

        throw new MemberHasNoLastEntryException();
    }

    /**
     * @return bool
     */
    public function hasLastEntry()
    {
        return $this->lastEntry !== null;
    }

    /**
     * Searches for voucher that is current for actual time and sets it to currentVoucher param
     */
    public function updateCurrentVoucher()
    {
        $now = time();

        if ($this->hasCurrentVoucher()) {
            $currentStart = $this->currentVoucher->startDate()->getTimestamp();
            $currentEnd = $this->currentVoucher->endDate()->getTimestamp();

            if ($currentStart <= $now && $now <= $currentEnd) {
                return;
            }
        }

        if ($this->vouchers()->count() > 0) {
            foreach ($this->vouchers() as $voucher) {
                $start = $voucher->startDate()->getTimestamp();
                $end = $voucher->endDate()->getTimestamp();
                if ($start <= $now && $now <= $end) {
                    $this->currentVoucher = $voucher;

                    return;
                }
            }
        }
    }
}
