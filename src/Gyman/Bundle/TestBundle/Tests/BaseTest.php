<?php

namespace Gyman\Bundle\TestBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BaseTest extends WebTestCase
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
    }

    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param mixed $expectedName
     * @param mixed $expectedValue
     * @param mixed $parameter
     */
    protected function assertParameterEqual($expectedName, $expectedValue, $parameter)
    {
        $this->assertEquals($expectedName, $parameter->getName());
        $this->assertEquals($expectedValue, $parameter->getValue());
    }
}
