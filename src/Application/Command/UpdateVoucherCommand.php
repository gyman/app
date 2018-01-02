<?php

declare(strict_types=1);

namespace Gyman\Application\Command;

use Gyman\Domain\Voucher;

/**
 * Class UpdateVoucherCommand.
 */
class UpdateVoucherCommand implements VoucherCommandInterface
{
    /** @var string */
    public $voucherId;

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
     * @param Voucher $voucher
     *
     * @return UpdateVoucherCommand
     */
    public static function createFromVoucher(Voucher $voucher)
    {
        $command = new self();
        $command->voucherId = $voucher->id();
        $command->startDate = $voucher->startDate();
        $command->endDate = $voucher->endDate();
        $command->maximumAmount = $voucher->maximumAmount();
        $command->price = $voucher->price()->amount();

        return $command;
    }
}
