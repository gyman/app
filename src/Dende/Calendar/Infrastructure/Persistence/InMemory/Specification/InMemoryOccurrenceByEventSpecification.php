<?php
namespace Dende\Calendar\Infrastructure\Persistence\InMemory\Specification;

use Dende\Calendar\Domain\Calendar\Event;
use Dende\Calendar\Domain\Calendar\Event\Occurrence;
use Dende\Calendar\Domain\Repository\Specification\InMemoryOccurrenceSpecificationInterface;

/**
 * Class InMemoryOccurrenceByEventSpecification
 * @package Dende\Calendar\Infrastructure\Persistence\InMemory\Specification
 */
final class InMemoryOccurrenceByEventSpecification implements InMemoryOccurrenceSpecificationInterface
{
    /**
     * @var Event
     */
    private $event;

    /**
     * InMemoryOccurrenceByEventSpecification constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * @param Occurrence $occurrence
     * @return bool
     */
    public function specifies(Occurrence $occurrence)
    {
        return $occurrence->event()->id()->id() === $this->event->id()->id();
    }
}
