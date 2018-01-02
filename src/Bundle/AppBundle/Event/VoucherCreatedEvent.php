<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Event;

use Gyman\Domain\Voucher;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class VoucherCreatedEvent.
 */
class VoucherCreatedEvent extends Event
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
     * @return \Gyman\Domain\Member
     */
    public function getMember()
    {
        return $this->voucher->getMember();
    }
}
