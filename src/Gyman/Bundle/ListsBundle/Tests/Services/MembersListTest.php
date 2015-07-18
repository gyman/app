<?php

namespace Gyman\Bundle\ListsBundle\Tests\Services;

use Gyman\Bundle\TestBundle\Tests\BaseTest;
use Mockery as m;

class MembersListTest extends BaseTest
{
    private $list;

    public function testGetSortingFunction()
    {
        $this->markTestIncomplete();
        $list = $this->getMembersList();

        $results = $list->getResults();
        $this->assertTrue(true);
    }

    private function getMembersList()
    {
        if (!$this->list) {
            $this->list = new \Gyman\Bundle\ListsBundle\Services\MembersList();
            $this->list->setListParameters($this->getListParametersMock());
            $this->list->setFilterProvider($this->getFilterProviderMock());
            $this->list->setRepository(
                $this->getContainer()->get('doctrine.orm.club_entity_manager')->getRepository('MembersBundle:Member')
            );
            $this->list->setTemplating($this->getTemplatingMock());
        }

        return $this->list;
    }

    public function getListParametersMock()
    {
        $mock = m::mock('Gyman\Bundle\ListsBundle\Services\ListParameters');
//        $mock->shouldReceive('foo')->with(5, m::any())->once()->andReturn(10);
        return $mock;
    }

    public function getFilterProviderMock()
    {
        $mock = m::mock("Gyman\Bundle\FiltersBundle\Services\FilterProvider");
//        $mock->shouldReceive('foo')->with(5, m::any())->once()->andReturn(10);
        return $mock;
    }

    public function getRepositoryMock()
    {
        $mock = m::mock("Gyman\Bundle\MembersBundle\Entity\MemberRepository");
//        $mock->shouldReceive('foo')->with(5, m::any())->once()->andReturn(10);
        return $mock;
    }

    public function getTemplatingMock()
    {
        $mock = m::mock("Symfony\Bundle\TwigBundle\TwigEngine");
//        $mock->shouldReceive('foo')->with(5, m::any())->once()->andReturn(10);
        return $mock;
    }
}
