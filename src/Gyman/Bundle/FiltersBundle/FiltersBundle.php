<?php

namespace Gyman\Bundle\FiltersBundle;

use Gyman\Bundle\FiltersBundle\DependencyInjection\CompilerPass\AddFiltersToProviderPerList;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @codeCoverageIgnore
 */
class FiltersBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new AddFiltersToProviderPerList());
    }
}
