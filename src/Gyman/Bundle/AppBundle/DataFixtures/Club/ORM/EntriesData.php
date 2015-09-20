<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Carbon\Carbon;
use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\AppBundle\Entity\Member;
use Gyman\Bundle\AppBundle\Factory\EntryFactory;

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
     * @throws \Gyman\Domain\Exception\LastEntryIsStillOpenedException
     * @throws \Gyman\Domain\Exception\NoCurrentVoucherForVoucherEntryException
     * @return \Gyman\Bundle\AppBundle\Entity\Entry
     */
    public function insert($params)
    {
        /** @var Member $member */
        $member = $this->getReference($params['member']);

        $entry = EntryFactory::createFromArray([
            'startDate' => Carbon::parse($params['startDate']),
            'type'      => $params['type'],
            'endDate'   => is_null($params['endDate']) ? null : Carbon::parse($params['endDate']),
            'price'     => ['amount' => $params['price'], 'currency' => 'PLN'],
        ]);

        $member->enter($entry);
        $this->manager->persist($member);

        return $entry;
    }
}
