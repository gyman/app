<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Exception;

use Gyman\Domain\Voucher;

class VoucherManagerException extends \Exception
{
    const ENDDATE_IN_FUTURE = 1101;
    /**
     * @var Voucher
     */
    private $voucher;

    public function __construct($message, $code, $previous, Voucher $voucher)
    {
        $this->setVoucher($voucher);
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return Voucher
     */
    public function getVoucher()
    {
        return $this->voucher;
    }

    /**
     * @param \Gyman\Domain\Voucher $voucher
     *
     * @return \Gyman\Bundle\AppBundle\Exception\VoucherManagerException
     */
    public function setVoucher(Voucher $voucher)
    {
        $this->voucher = $voucher;

        return $this;
    }
}
