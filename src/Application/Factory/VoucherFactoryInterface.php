<?php

declare(strict_types=1);

namespace Gyman\Application\Factory;

use Gyman\Domain\Voucher;

interface VoucherFactoryInterface
{
    /**
     * @param $params
     * @param mixed $array
     *
     * @return Voucher
     */
    public static function createFromArray($array = []);

    /**
     * @return Voucher
     */
    public static function create();
}
