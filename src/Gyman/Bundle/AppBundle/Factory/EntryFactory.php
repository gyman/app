<?php
namespace Gyman\Bundle\AppBundle\Factory;

use Gyman\Bundle\AppBundle\Entity\Entry;
use Gyman\Domain\Command\OpenEntryCommand;
use Gyman\Domain\Model\Price;

/**
 * Class EntryFactory
 * @package Gyman\Bundle\AppBundle\Factory
 */
final class EntryFactory
{
    /**
     * @param $params
     * @return Entry
     */
    public static function createFromArray($array)
    {
        $template = [
            'startDate'            => null,
            'endDate'              => null,
            'price'                => ['amount' => 0, 'currency' => 'PLN'],
            'type'                 => null,
            'occurrence'           => null,
        ];

        $array = array_merge($template, $array);

        $entry = new Entry(
            $array['startDate'],
            $array['type'],
            $array['endDate'],
            new Price($array['price']['amount'], $array['price']['currency']),
            $array['occurrence']
        );

        return $entry;
    }

    /**
     * @return Entry
     */
    public static function create()
    {
        return self::createFromArray([]);
    }

    public static function createFromOpenEntryCommand(OpenEntryCommand $command)
    {
        return self::createFromArray([
            'startDate' => $command->startDate,
            'endDate'   => null,
            'price'     => ['amount' => $command->price, 'currency' => 'PLN'],
            'type'      => $command->entryType,
            'occurrence' => $command->occurrence
        ]);
    }
}
