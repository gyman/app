<?php
namespace Gyman\Bundle\VouchersBundle\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\VouchersBundle\Entity\Price;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;
use Gyman\Component\Vouchers\Factory\VoucherFactoryInterface;

final class VoucherFactory implements VoucherFactoryInterface
{
    /**
     * @param $params
     * @return Voucher
     */
    public static function createFromArray($array)
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
}
