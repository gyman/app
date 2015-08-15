<?php

namespace Gyman\Component\Members\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Gyman\Bundle\SectionBundle\Entity\Section;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;

/**
 * Class Member
 * @package Gyman\Component\Members
 */
class Member
{
    /**
     * @var EmailAddress
     */
    protected $email;

    /**
     * @var Details
     */
    protected $details;

    /**
     * @var ArrayCollection|Section[]
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
    public function __construct(EmailAddress $email, Details $details, $sections = [], $vouchers = [], $entries = [], $currentVoucher, $lastEntry)
    {
        $this->email = $email;
        $this->details = $details;
        $this->sections = $sections;
        $this->vouchers = $vouchers;
        $this->entries = $entries;
        $this->currentVoucher = $currentVoucher;
        $this->lastEntry = $lastEntry;
    }

    public function email()
    {
        return $this->email;
    }

    public function details(){
        return $this->details;
    }

    public function sections(){
        return $this->sections;
    }

    public function vouchers(){
        return $this->vouchers;
    }

    public function entries() {
        return $this->entries;
    }
}
