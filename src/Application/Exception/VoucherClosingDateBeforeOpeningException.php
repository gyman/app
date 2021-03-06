<?php
namespace Gyman\Application\Exception;

use Gyman\Bundle\AppBundle\Globals;

/**
 * Class VoucherClosingDateBeforeOpeningException
 * @package Gyman\Domain
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
