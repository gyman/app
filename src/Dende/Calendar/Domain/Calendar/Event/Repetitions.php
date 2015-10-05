<?php
namespace Dende\Calendar\Domain\Calendar\Event;

/**
 * Class Repetitions
 * @package Gyman\Domain\Model
 */
class Repetitions
{
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;
    const SUNDAY = 7;

    /**
     * @var array
     */
    public static $availableWeekdays = [
        self::MONDAY    => 'monday',
        self::TUESDAY   => 'tuesday',
        self::WEDNESDAY => 'wednesday',
        self::THURSDAY  => 'thursday',
        self::FRIDAY    => 'friday',
        self::SATURDAY  => 'saturday',
        self::SUNDAY    => 'sunday',
    ];

    /**
     * @var array
     */
    private $weekdays = [];

    /**
     * Repetitions constructor.
     * @param array $weekdays
     */
    public function __construct(array $weekdays)
    {
        $this->weekdays = $weekdays;
    }

    /**
     * @return array
     */
    public function weekly()
    {
        return $this->weekdays;
    }
}
