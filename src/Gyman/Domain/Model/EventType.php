<?php
namespace Gyman\Domain\Model;
use Exception;

/**
 * Class EventType
 * @package Gyman\Domain\Model
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
        self::TYPE_WEEKLY
    ];

    /**
     * @var string
     */
    private $type;

    /**
     * EventType constructor.
     * @param $type
     */
    public function __construct($type = self::TYPE_SINGLE)
    {
        if(!in_array($type, self::$availableTypes))
        {
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
     */
    public function type()
    {
        return $this->type;
    }
}