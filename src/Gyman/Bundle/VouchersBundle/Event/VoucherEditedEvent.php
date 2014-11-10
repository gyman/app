<?php

namespace Gyman\Bundle\VouchersBundle\Event;

use Gyman\Bundle\VouchersBundle\Entity\Voucher;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class VoucherCreatedEvent
 * @package Gyman\Bundle\VouchersBundle\Event
 */
class VoucherEditedEvent extends Event
{
    /**
     * @var Voucher
     */
    protected $voucher;

    /**
     * @param Voucher $voucher
     */
    public function __construct(Voucher $voucher)
    {
        $this->voucher = $voucher;
    }

    /**
     * @return Voucher
     */
    public function getVoucher()
    {
        return $this->voucher;
    }

    /**
     * @return \Gyman\Bundle\VouchersBundle\Entity\Member
     */
    public function getMember()
    {
        return $this->voucher->getMember();
    }
}
