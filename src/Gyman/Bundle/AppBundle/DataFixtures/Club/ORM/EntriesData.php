<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Carbon\Carbon;
use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Domain\Member;
use Gyman\Application\Factory\EntryFactory;
use Dende\Calendar\Domain\Calendar\EventInterface;

/**
 * Class EntriesData
 * @package Gyman\Bundle\AppBundle\DataFixtures\Club\ORM
 */
final class EntriesData extends BaseFixture
{
    protected $dir = __DIR__;

    /**
     * @return int
     */
    public function getOrder()
    {
        return 30;
    }

    /**
     * @param $params
     * @return \Gyman\Domain\Entry
     */
    public function insert($params)
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
