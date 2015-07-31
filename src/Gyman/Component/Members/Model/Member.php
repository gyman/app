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
     * @var Details
     */
    protected $details;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

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
     * Member constructor.
     * @param $email
     * @param Details $details
     * @param string $password
     * @param ArrayCollection|\Gyman\Bundle\SectionBundle\Entity\Section[] $sections
     * @param ArrayCollection|\Gyman\Bundle\VouchersBundle\Entity\Voucher[] $vouchers
     * @param Voucher $currentVoucher
     * @param Entry $lastEntry
     * @param $entries
     */
    public function __construct($email, Details $details, $password, $sections, $vouchers, Voucher $currentVoucher, Entry $lastEntry, $entries)
    {
        $this->email = $email;
        $this->details = $details;
        $this->password = $password;
        $this->sections = $sections;
        $this->vouchers = $vouchers;
        $this->currentVoucher = $currentVoucher;
        $this->lastEntry = $lastEntry;
        $this->entries = $entries;
    }

    public function toEntity()
    {
    }

    public function fromEntity(){
        
    }
}
