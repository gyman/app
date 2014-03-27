<?php

namespace Dende\ListsBundle\Tests\Services;

use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use \Mockery as m;
use PHPUnit_Framework_TestCase;

class MembersListTest extends WebTestCase {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @var Doctrine\Common\DataFixtures\Loader 
     */
    private $loader;
    private $container;
    private $list;

    // <editor-fold defaultstate="collapsed" desc="test setup">
    protected function getBootedKernel(array $options = array()) {
        static::$kernel = static::createKernel($options);
        static::$kernel->boot();

        return static::$kernel;
    }

    public function getContainer() {
        $kernel = $this->getBootedKernel();

        if (!$this->container)
        {
            $this->container = $kernel->getContainer();
        }

        return $this->container;
    }

    protected function setUp() {
        $this->em = $this->getContainer()
                ->get('doctrine')
                ->getManager()
        ;

        $this->loader = new Loader;
        $this->loader->loadFromDirectory(__DIR__ . '/../../../MembersBundle/DataFixtures/ORM');
        $this->loader->loadFromDirectory(__DIR__ . '/../../../VouchersBundle/DataFixtures/ORM');
        $this->loader->loadFromDirectory(__DIR__ . '/../../../ScheduleBundle/DataFixtures/ORM');

        $purger = new ORMPurger($this->em);
        $executor = new ORMExecutor($this->em, $purger);
        $executor->execute($this->loader->getFixtures());
    }

    protected function tearDown() {
//        parent::tearDown();
//        $this->em->close();
        m::close();
    }

    // </editor-fold>

    public function testGetSortingFunction() {
        $list = $this->getMembersList();
        
        $results = $list->getResults();
        $this->assertTrue(true);
    }

    private function getMembersList() {

        if (!$this->list)
        {
            $this->list = new \Dende\ListsBundle\Services\MembersList;
            $this->list->setListParameters($this->getListParametersMock());
            $this->list->setFilterProvider($this->getFilterProviderMock());
            $this->list->setRepository($this->getContainer()->get("member_repository"));
            $this->list->setTemplating($this->getTemplatingMock());
        }
        
        return $this->list;
    }

    public function getListParametersMock() {
        $mock = m::mock('Dende\ListsBundle\Services\ListParameters');
//        $mock->shouldReceive('foo')->with(5, m::any())->once()->andReturn(10);
        return $mock;
    }

    public function getFilterProviderMock() {
        $mock = m::mock("Dende\FiltersBundle\Services\FilterProvider");
//        $mock->shouldReceive('foo')->with(5, m::any())->once()->andReturn(10);
        return $mock;
    }

    public function getRepositoryMock() {
        $mock = m::mock("Dende\MembersBundle\Entity\MemberRepository");
//        $mock->shouldReceive('foo')->with(5, m::any())->once()->andReturn(10);
        return $mock;
    }

    public function getTemplatingMock() {
        $mock = m::mock("Symfony\Bundle\TwigBundle\TwigEngine");
//        $mock->shouldReceive('foo')->with(5, m::any())->once()->andReturn(10);
        return $mock;
    }

}
