<?php
namespace Gyman\Application\Factory;

use Gyman\Domain\Voucher;

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
