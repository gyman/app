<?php
namespace Gyman\Component\Vouchers\Factory;

use Gyman\Component\Vouchers\Model\Voucher;

interface VoucherFactoryInterface
{
    /**
     * @param $params
     * @return Voucher
     */
    public static function createFromArray($array = []);

    /**
     * @return Voucher
     */
    public static function create();
}
