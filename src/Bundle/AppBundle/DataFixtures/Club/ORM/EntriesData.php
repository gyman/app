<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Carbon\Carbon;
use Gyman\Bundle\AppBundle\DataFixtures\BaseFixture;
use Gyman\Domain\Member;
use Gyman\Application\Factory\EntryFactory;
use Gyman\Calendar\Domain\Calendar\EventInterface;

class EntriesData extends BaseFixture
{
    public function getOrder() : int
    {
        return 30;
    }

    public function insert(array $params = [])
    {
        /** @var Member $member */
        $member = $this->getReference($params['member']);

        list($eventId, $occurrenceId) = explode("#", $params['occurrence']);
        /** @var EventInterface $event */
        $event = $this->getReference($eventId);
        $occurrence = $event->occurrences()->get(intval($occurrenceId));

        $entry = EntryFactory::createFromArray([
            'startDate' => Carbon::parse($params['startDate']),
            'type'      => $params['type'],
            'endDate'   => is_null($params['endDate']) ? null : Carbon::parse($params['endDate']),
            'price'     => ['amount' => $params['price']['amount'], 'currency' => 'PLN'],
            'occurrence'=> $occurrence,
            'member'    => $member
        ]);

        $member->enter($entry);

        return $entry;
    }
}
