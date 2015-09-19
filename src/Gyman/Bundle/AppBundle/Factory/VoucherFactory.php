<?php
namespace Gyman\Bundle\AppBundle\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\AppBundle\Entity\Voucher;
use Gyman\Bundle\AppBundle\Globals;
use Gyman\Domain\Command\CreateVoucherCommand;
use Gyman\Domain\Command\VoucherCommandInterface;
use Gyman\Domain\Factory\VoucherFactoryInterface;
use Gyman\Domain\Model\Price;

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
            'startDate'           => (new \DateTime('now'))->format(Globals::getDefaultDateTimeFormat()),
            'endDate'             => (new \DateTime('+1 month'))->format(Globals::getDefaultDateTimeFormat()),
            'price'               => null,
            'maximumAmount'       => null,
            'entries'             => new ArrayCollection(),
            'member'              => MemberFactory::create(),
        ];

        $array = array_merge($template, $array);

        return new Voucher(
            (new \DateTime())->createFromFormat(Globals::getDefaultDateTimeFormat(), $array['startDate']),
            (new \DateTime())->createFromFormat(Globals::getDefaultDateTimeFormat(), $array['endDate']),
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
        return self::createFromArray([
            'startDate'           => $command->startDate->format(Globals::getDefaultDateTimeFormat()),
            'endDate'             => $command->endDate->format(Globals::getDefaultDateTimeFormat()),
            'price'               => ['amount' => $command->price, 'currency' => Globals::getDefaultCurrency()],
            'maximumAmount'       => $command->maximumAmount,
            'entries'             => new ArrayCollection(),
            'member'              => $command->member,
        ]);
    }
}
