<?php

namespace Gyman\Bundle\FiltersBundle\Tests\DependencyInjection\CompilerPass;

use Gyman\Bundle\FiltersBundle\DependencyInjection\CompilerPass\AddFiltersToProviderPerList;
use Gyman\Bundle\TestBundle\Tests\BaseTest;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class AddFiltersToProviderPerListTest extends BaseTest
{
    public function testProcess()
    {
        $this->markTestIncomplete();
        $list = ["aaa", "bbb"];

        $containerBuilder = new ContainerBuilder();
        $containerBuilder->setParameter("filter_provider.lists", $list);
        $containerBuilder->addDefinitions([
            "filter_provider" => new Definition(
                "Gyman\Bundle\FiltersBundle\Services\FilterProvider",
                [$this->container]
            )
        ]);

        $compilerPass = new AddFiltersToProviderPerList();
        $compilerPass->process($containerBuilder);
    }
}
