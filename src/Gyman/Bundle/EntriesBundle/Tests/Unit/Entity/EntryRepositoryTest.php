<?php

namespace Gyman\Bundle\EntriesBundle\Tests\Unit\Entity;

use Gyman\Bundle\TestBundle\Tests\BaseTest;

class EntryRepositoryTest extends BaseTest
{
    public function testGetCountByActivitiesQueryBuilder()
    {
        $startDate = new \DateTime();
        $startDate->modify("00:11:22");

        $endDate = clone($startDate);
        $endDate->modify("23:24:25");

        $query = $this->container->get('entry_repository')->getCountByActivitiesQueryBuilder($startDate, $endDate);

        $testDql = 'SELECT a.name, SUBSTRING(o.startDate,1,10) as date, '
            . 'count(e) as cnt FROM Gyman\Bundle\EntriesBundle\Entity\Entry e '
            . 'INNER JOIN e.occurence o '
            . 'INNER JOIN o.event ev '
            . 'INNER JOIN ev.activity a '
            . 'WHERE e.startDate > :start '
            . 'AND (e.endDate < :end or e.endDate is null) '
            . 'GROUP BY date, a.name';

        $this->assertEquals($testDql, $query->getDQL());
        $this->assertEquals(2, $query->getParameters()->count());
        $this->assertParameterEqual('start', $startDate, $query->getParameters()->get(0));
        $this->assertParameterEqual('end', $endDate, $query->getParameters()->get(1));
    }
}
