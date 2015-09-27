<?php
namespace Gyman\Domain\Factory;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Command\CreateEventCommand;
use Gyman\Domain\Model\Duration;
use Gyman\Domain\Model\Event;
use Gyman\Domain\Model\EventType;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\Repetitions;

/**
 * Class EventFactory
 * @package Gyman\Domain
 */
final class EventFactory implements EventFactoryInterface
{
    /**
     * @param $params
     * @return Event
     */
    public static function createFromArray($array)
    {
        $template = [
            'title'        => '',
            'repetitions'        => new Repetitions([]),
            'type'        => new EventType(),
            'occurences'    => new ArrayCollection()
        ];

        $array = array_merge($template, $array);

        return new Event(
            $array['type'],
            $array['title'],
            $array['occurences'],
            $array['repetitions']
        );
    }

    /**
     * @return Event
     */
    public static function create()
    {
        return self::createFromArray([]);
    }

    /**
     * @param CreateEventCommand $command
     * @return Event
     */
    public static function createFromCommand(CreateEventCommand $command)
    {
        return self::createFromArray([
            'title' => $command->title,
            'repetitions' => new Repetitions($command->repetitionDays),
            'type' => new EventType($command->type)
        ]);
    }
}
