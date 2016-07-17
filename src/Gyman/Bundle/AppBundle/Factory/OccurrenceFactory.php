<?php
namespace Gyman\Bundle\AppBundle\Factory;

use DateTime;
use Dende\Calendar\Application\Factory\OccurrenceFactoryInterface;
use Dende\Calendar\Application\Factory\OccurrenceFactory as BaseOccurrenceFactory;
use Dende\Calendar\Domain\Calendar\Event\Duration;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Calendar\Event\Occurrence;

class OccurrenceFactory extends BaseOccurrenceFactory implements OccurrenceFactoryInterface
{
    /**
     * @param array $array
     * @return Occurrence
     */
    public function createFromArray($array = [])
    {
        $template = [
            'id'             => $this->idGenerator->generateId(),
            'startDate'      => new DateTime('now'),
            'duration'       => new Duration(90),
            'event'          => null,
            'instructor'     => null,
            'subject'        => '',
            'note'           => '',
            'entries'        => new ArrayCollection()
        ];

        $array = array_merge($template, $array);

        return new Occurrence(
            $array['id'],
            $array['startDate'],
            $array['duration'],
            $array['event'],
            $array['instructor'],
            $array['subject'],
            $array['note'],
            $array['entries']
        );
    }
}