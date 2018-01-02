<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Carbon\Carbon;
use Dende\Calendar\Domain\Calendar\EventInterface;
use Gyman\Application\Factory\EntryFactory;
use Gyman\Bundle\AppBundle\DataFixtures\BaseFixture;
use Gyman\Domain\Member;

class EntriesData extends BaseFixture
{
    public function getOrder(): int
    {
        return 30;
    }

    public function insert(array $params = [])
    {
        /** @var Member $member */
        $member = $this->getReference($params['member']);

        list($eventId, $occurrenceId) = explode('#', $params['occurrence']);
        /** @var EventInterface $event */
        $event = $this->getReference($eventId);
        $occurrence = $event->occurrences()->get((int) $occurrenceId);

        $entry = EntryFactory::createFromArray([
            'startDate' => Carbon::parse($params['startDate']),
            'type'      => $params['type'],
            'endDate'   => null === $params['endDate'] ? null : Carbon::parse($params['endDate']),
            'price'     => ['amount' => $params['price']['amount'], 'currency' => 'PLN'],
            'occurrence'=> $occurrence,
            'member'    => $member,
        ]);

        $member->enter($entry);

        return $entry;
    }
}
