<?php
namespace Gyman\Bundle\AppBundle\Factory;

use DateTime;
use Dende\Calendar\Application\Factory\OccurrenceFactoryInterface;
use Dende\Calendar\Application\Factory\OccurrenceFactory as BaseOccurrenceFactory;
use Dende\Calendar\Domain\Calendar\Event\Occurrence\OccurrenceId;
use Dende\Calendar\Domain\Calendar\Event\OccurrenceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Calendar\Event\Occurrence;

class OccurrenceFactory extends BaseOccurrenceFactory implements OccurrenceFactoryInterface
{
    /**
     * @param array $array
     * @return Occurrence
     */
    public function createFromArray(array $array = []) : OccurrenceInterface
    {
        $template = [
            'occurrenceId'   => OccurrenceId::create(),
            'event'          => null,
            'startDate'      => new DateTime(),
            'duration'       => null,
            'instructor'     => null,
            'subject'        => null,
            'note'           => null,
            'entries'        => new ArrayCollection()
        ];

        $array = array_merge($template, $array);

        return new Occurrence(
            $array['occurrenceId'],
            $array['event'],
            $array['startDate'],
            $array['duration'],
            $array['instructor'],
            $array['subject'],
            $array['note'],
            $array['entries']
        );
    }
}