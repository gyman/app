<?php
namespace Gyman\Component\Vouchers\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Component\Vouchers\Model\Price;
use Gyman\Component\Vouchers\Model\Voucher;

/**
 * Class VoucherFactory
 * @package Gyman\Component\Vouchers
 */
final class VoucherFactory implements VoucherFactoryInterface
{
    /**
     * @param $params
     * @return Voucher
     */
    public static function createFromArray($array = [])
    {
        $template = [
            'startDate'           => null,
            'endDate'             => null,
            'price'               => null,
            'maximumAmount'       => null,
            'entries'             => new ArrayCollection(),
        ];

        $array = array_merge($template, $array);

        return new Voucher(
            new \DateTime($array['startDate']),
            new \DateTime($array['endDate']),
            new Price(
                $array['price']['amount'],
                $array['price']['currency']
            ),
            $array['maximumAmount']
        );
    }

    /**
     * @return Voucher
     */
    public static function create()
    {
        return self::createFromArray();
    }
}
