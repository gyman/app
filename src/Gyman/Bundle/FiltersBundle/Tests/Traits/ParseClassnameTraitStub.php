<?php

namespace Gyman\Bundle\FiltersBundle\Tests\Traits;

use Gyman\Bundle\FiltersBundle\Traits\ParseClassname;

class ParseClassnameTraitStub
{

    use ParseClassname;

    public function testParseClassname($object)
    {
        return $this->parseClassname($object);
    }
}
