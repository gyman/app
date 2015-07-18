<?php

namespace Gyman\Bundle\FiltersBundle\Tests\Services;

use Gyman\Bundle\TestBundle\Tests\BaseTest;
use Gyman\Bundle\FiltersBundle\Tests\Traits\ParseClassnameTraitStub;
use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;

class ParseClassnameTraitTest extends BaseTest
{
    public function testParseClassname()
    {
        $traitStub = new ParseClassnameTraitStub();
        $object = new WebTestCase();

        $classname = $traitStub->testParseClassname($object);
        $this->assertEquals("WebTestCase", $classname);
        $this->assertNotEquals("", $classname);
    }
}
