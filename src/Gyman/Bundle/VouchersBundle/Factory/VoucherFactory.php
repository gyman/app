<?php
namespace Gyman\Bundle\VouchersBundle\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Gyman\Bundle\VouchersBundle\DTO\VoucherDTO;
use Gyman\Bundle\VouchersBundle\Entity\Price;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;
use Gyman\Component\Vouchers\Factory\VoucherFactoryInterface;

/**
 * Class VoucherFactory
 * @package Gyman\Bundle\VouchersBundle\Factory
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
            'startDate'           => (new \DateTime("now"))->format(Globals::getDefaultDateTimeFormat()),
            'endDate'             => (new \DateTime("+1 month"))->format(Globals::getDefaultDateTimeFormat()),
            'price'               => null,
            'maximumAmount'       => null,
            'entries'             => new ArrayCollection(),
        ];

        $array = array_merge($template, $array);

        return new Voucher(
            (new \DateTime())->createFromFormat(Globals::getDefaultDateTimeFormat(), $array['startDate']),
            (new \DateTime())->createFromFormat(Globals::getDefaultDateTimeFormat(), $array['endDate']),
            new Price(
                $array['price']['amount'],
                $array['price']['currency']
            ),
            $array['maximumAmount']
        );
    }

    /**
     * @param VoucherDTO $dto
     * @return Voucher
     */
    public static function createFromDto(VoucherDTO $dto)
    {
        return self::createFromArray([
            'startDate' => $dto->startDate->format(Globals::getDefaultDateTimeFormat()),
            'endDate'   => $dto->endDate->format(Globals::getDefaultDateTimeFormat()),
            'price'     => [
                'amount'   => $dto->price,
                'currency' => 'PLN',
            ],
            'maximumAmount' => $dto->maximumAmount,
        ]);
    }

    /**
     * @return Voucher
     */
    public static function create()
    {
        return self::createFromArray([]);
    }
}
