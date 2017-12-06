<?php
namespace Gyman\Application\Factory;

use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Voucher;
use Gyman\Bundle\AppBundle\Globals;
use Gyman\Application\Command\CreateVoucherCommand;
use Gyman\Domain\Voucher\Price;

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
            'startDate'     => Carbon::now(),
            'endDate'       => Carbon::parse('+1 month'),
            'price'         => null,
            'maximumAmount' => null,
            'entries'       => new ArrayCollection(),
            'member'        => null,
            'closedAt'      => null
        ];

        $array = array_merge($template, $array);

        return new Voucher(
            $array['startDate'],
            $array['endDate'],
            new Price(
                $array['price']['amount'],
                $array['price']['currency']
            ),
            $array['maximumAmount'],
            $array['entries'],
            $array['member'],
            $array['closedAt']
        );
    }

    /**
     * @return Voucher
     */
    public static function create()
    {
        return self::createFromArray([]);
    }

    /**
     * @param CreateVoucherCommand $command
     * @return Voucher
     */
    public static function createFromVoucherCommand(CreateVoucherCommand $command)
    {
        $format  = Globals::getDefaultDateTimeFormat();

        return self::createFromArray([
            'startDate'           => $command->startDate,
            'endDate'             => $command->endDate,
            'price'               => ['amount' => $command->price, 'currency' => Globals::getDefaultCurrency()],
            'maximumAmount'       => $command->maximumAmount,
            'entries'             => new ArrayCollection(),
            'member'              => $command->member,
        ]);
    }
}
