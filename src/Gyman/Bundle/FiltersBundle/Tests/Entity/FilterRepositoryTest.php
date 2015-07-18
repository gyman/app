<?php

namespace Gyman\Bundle\EntriesBundle\Tests\Entity;

use Gyman\Bundle\TestBundle\Tests\BaseTest;

class FilterRepositoryTest extends BaseTest
{
    public function testGetPinnedFiltersQueryBuilder()
    {
        $query = $this->container->get('filter_repository')->getPinnedFiltersQueryBuilder();

        $testDql = "SELECT f FROM Gyman\Bundle\FiltersBundle\Entity\Filter f WHERE f.pinned = true";

        $this->assertEquals($testDql, $query->getDQL());
        $this->assertEquals(0, $query->getParameters()->count());
    }

    public function testGetFiltersQueryBuilder()
    {
        $query = $this->container->get('filter_repository')->getFiltersQueryBuilder();

        $testDql = "SELECT f FROM Gyman\Bundle\FiltersBundle\Entity\Filter f";

        $this->assertEquals($testDql, $query->getDQL());
        $this->assertEquals(0, $query->getParameters()->count());
    }

    public function testGetFiltersByListnameQueryBuilder()
    {
        $query = $this->container->get('filter_repository')->getFiltersByListnameQueryBuilder('testListname');

        $testDql = "SELECT f FROM Gyman\Bundle\FiltersBundle\Entity\Filter f WHERE f.listname = :listname";

        $this->assertEquals($testDql, $query->getDQL());
        $this->assertEquals(1, $query->getParameters()->count());
        $this->assertEquals('listname', $query->getParameters()->get(0)->getName());
        $this->assertEquals('testListname', $query->getParameters()->get(0)->getValue());
    }
}
