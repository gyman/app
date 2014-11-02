<?php

namespace Gyman\Component\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as BaseWebTestCase;

abstract class ContainerAwareTestCase extends BaseWebTestCase
{
    protected $container;

    protected function setUp()
    {
        $this->resetKernel();
        exec("bin/phing -Denv=test reset-db");
    }

    protected function resetKernel()
    {
        if (null !== static::$kernel) {
            static::$kernel->shutdown();
        }

        static::$kernel = static::createKernel();

        static::$kernel->boot();

        $this->container = static::$kernel->getContainer();
    }
}
