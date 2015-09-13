<?php
namespace Gyman\Component\Vouchers\Exception;

use Gyman\Bundle\DefaultBundle\Lib\Globals;

/**
 * Class VoucherClosingDateBeforeOpeningException
 * @package Gyman\Component\Vouchers
 */
class VoucherClosingDateBeforeOpeningException extends \Exception
{
    /**
     * VoucherClosingDateBeforeOpeningException constructor.
     * @param \DateTime $start
     * @param \DateTime $end
     */
    public function __construct(\DateTime $start, \DateTime $end)
    {
        $this->message = sprintf(
            'Voucher has endDate (%s) before startDate (%s)',
            $start->format(Globals::getDefaultDateTimeFormat()),
            $end->format(Globals::getDefaultDateTimeFormat())
        );
    }
}
