<?php
namespace Gyman\Application\Command;

use DateTime;
use Gyman\Domain\Voucher;

class CloseVoucherCommand
{
    /** @var Voucher */
    public $voucher;

    /** @var DateTime */
    public $closingDate;
}