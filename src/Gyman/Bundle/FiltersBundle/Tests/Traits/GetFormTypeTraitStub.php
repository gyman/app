<?php

namespace Gyman\Bundle\FiltersBundle\Tests\Traits;

use Gyman\Bundle\FiltersBundle\Traits\GetFormType;
use Gyman\Bundle\FiltersBundle\Traits\ParseClassname;

class GetFormTypeTraitStub
{
    use ParseClassname, GetFormType;

    public function testGetFormType($object)
    {
        return $this->getFormType($object);
    }
}
