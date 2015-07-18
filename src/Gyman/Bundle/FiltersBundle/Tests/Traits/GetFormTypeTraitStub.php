<?php

namespace Gyman\Bundle\FiltersBundle\Tests\Traits;

use Gyman\Bundle\FiltersBundle\Traits\ParseClassname;
use Gyman\Bundle\FiltersBundle\Traits\GetFormType;

class GetFormTypeTraitStub
{
    use ParseClassname, GetFormType;

    public function testGetFormType($object)
    {
        return $this->getFormType($object);
    }
}
