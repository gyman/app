<?php
namespace Gyman\Bundle\TestBundle\Traits;

trait SetupTrait
{
    protected $container;

    public function setUp()
    {
        if (null !== static::$kernel) {
            static::$kernel->shutdown();
        }

        static::$kernel = static::createKernel(['environment' => 'test']);
        static::$kernel->boot();

        $this->container = static::$kernel->getContainer();

//        $loader = $this->getContainer()->get('data_fixture_loader');

//        $root = dirname($this->getContainer()->get('kernel')->getRootDir());

//        $loader->load([
//            $root . "/src/Dende/TestBundle/DataFixtures/ORM"
//        ]);
    }

    public function getContainer()
    {
        return $this->container;
    }
}
