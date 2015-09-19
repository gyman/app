<?php
namespace Gyman\Domain\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\Price;
use Gyman\Domain\Model\Voucher;

/**
 * Class VoucherFactory
 * @package Gyman\Domain
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
            'member'              => MemberFactory::create(),
        ];

        $array = array_merge($template, $array);

        return new Voucher(
            new \DateTime($array['startDate']),
            new \DateTime($array['endDate']),
            new Price(
                $array['price']['amount'],
                $array['price']['currency']
            ),
            $array['maximumAmount'],
            [],
            $array['member']
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
