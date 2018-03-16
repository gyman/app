<?php
namespace Gyman\Calendar\Application\Service\UpdateStrategy;

use Gyman\Calendar\Application\Factory\EventFactory;
use Gyman\Calendar\Application\Factory\EventFactoryInterface;
use Gyman\Calendar\Application\Factory\OccurrenceFactoryInterface;

trait SetFactoriesTrait
{
    /** @var EventFactoryInterface */
    private $eventFactory;

    /** @var OccurrenceFactoryInterface */
    private $occurrenceFactory;

    /**
     * @param EventFactory $eventFactory
     */
    public function setEventFactory(EventFactoryInterface $eventFactory)
    {
        $this->eventFactory = $eventFactory;
    }

    public function setOccurrenceFactory(OccurrenceFactoryInterface $occurrenceFactory)
    {
        $this->occurrenceFactory = $occurrenceFactory;
    }
}
