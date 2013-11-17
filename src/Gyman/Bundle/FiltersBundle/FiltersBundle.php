<?php

namespace Gyman\Bundle\FiltersBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Gyman\Bundle\FiltersBundle\DependencyInjection\CompilerPass\AddFiltersToProviderPerList;

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
