<?php

namespace Gyman\Bundle\FiltersBundle\Tests\Services;

use Gyman\Bundle\TestBundle\Tests\BaseTest;
use Gyman\Bundle\FiltersBundle\Tests\Traits\GetFormTypeTraitStub;
use Gyman\Bundle\FiltersBundle\Filters\Age;

class GetFormTypeTraitTest extends BaseTest
{

    public function testGetFormType()
    {
        $stub = new GetFormTypeTraitStub();
        $filterObject = new Age();

        $type = $stub->testGetFormType($filterObject);
        $this->assertEquals("Gyman\Bundle\FiltersBundle\Form\Subfilters\AgeType", get_class($type));
    }
}
