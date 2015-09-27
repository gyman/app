<?php
namespace Gyman\Domain\Model;

/**
 * Class Repetitions
 * @package Gyman\Domain\Model
 */
class Repetitions
{
    const SUNDAY = 0;
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;

    /**
     * @var array
     */
    public static $availableWeekdays = [
        self::SUNDAY => 'sunday',
        self::MONDAY => 'monday',
        self::TUESDAY => 'tuesday',
        self::WEDNESDAY => 'wednesday',
        self::THURSDAY => 'thursday',
        self::FRIDAY => 'friday',
        self::SATURDAY => 'saturday',
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
}