<?php
namespace Gyman\Calendar\Domain\Calendar\Event;

use Exception;

/**
 * Class EventType.
 */
final class EventType
{
    const TYPE_SINGLE = 'single';
    const TYPE_WEEKLY = 'weekly';

    /**
     * @var array
     */
    public static $availableTypes = [
        self::TYPE_SINGLE,
        self::TYPE_WEEKLY,
    ];

    /**
     * @var string
     */
    private $type;

    /**
     * EventType constructor.
     *
     * @param $type
     */
    public function __construct($type = self::TYPE_SINGLE)
    {
        if (!in_array($type, self::$availableTypes, true)) {
            throw new Exception(sprintf(
                "Not allowed event type '%s', only [%s] allowed",
                $type,
                implode(', ', self::$availableTypes)
            ));
        }

        $this->type = $type;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function type() : string
    {
        return $this->type;
    }

    public function isType($type)
    {
        return $this->type === $type;
    }

    public static function single() : EventType
    {
        return new self(self::TYPE_SINGLE);
    }

    public static function weekly() : EventType
    {
        return new self(self::TYPE_WEEKLY);
    }

    public function isWeekly() : bool
    {
        return $this->isType(self::TYPE_WEEKLY);
    }

    public function isSingle() : bool
    {
        return $this->isType(self::TYPE_SINGLE);
    }
}
