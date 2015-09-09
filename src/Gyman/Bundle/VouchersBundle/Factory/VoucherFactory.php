<?php
namespace Gyman\Bundle\VouchersBundle\Factory;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @param VoucherDTO $dto
     * @return Voucher
     */
    public static function createFromDto(VoucherDTO $dto)
    {
        return self::createFromArray([
            'startDate' => $dto->startDate->format('Y/m/d H:i:s'),
            'endDate'   => $dto->endDate->format('Y/m/d H:i:s'),
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
