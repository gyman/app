<?php
namespace Gyman\Domain\Factory;

use Gyman\Domain\Model\Voucher;

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
