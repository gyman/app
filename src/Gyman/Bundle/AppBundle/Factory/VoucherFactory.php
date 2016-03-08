<?php
namespace Gyman\Bundle\AppBundle\Factory;

use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Voucher;
use Gyman\Bundle\AppBundle\Globals;
use Gyman\Application\Command\CreateVoucherCommand;
use Gyman\Application\Command\VoucherCommandInterface;
use Gyman\Application\Factory\VoucherFactoryInterface;
use Gyman\Domain\Voucher\Price;

/**
 * Class VoucherFactory
 * @package Gyman\Bundle\AppBundle\Factory
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
            'startDate'           => Carbon::now(),
            'endDate'             => Carbon::parse('+1 month'),
            'price'               => null,
            'maximumAmount'       => null,
            'entries'             => new ArrayCollection(),
            'member'              => null,
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
            [],
            $array['member']
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
    public static function createFromVoucherCommand(VoucherCommandInterface $command)
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
