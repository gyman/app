<?php

namespace Gyman\Bundle\TestBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Gyman\Bundle\TestBundle\Traits\SetupTrait;

class BaseTest extends WebTestCase
{

    use SetupTrait;

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
