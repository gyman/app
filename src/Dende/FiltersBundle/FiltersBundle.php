<?php

namespace Dende\FiltersBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Dende\FiltersBundle\DependencyInjection\CompilerPass\AddFiltersToProvider;
use Dende\FiltersBundle\DependencyInjection\CompilerPass\AddFiltersToProviderPerList;

class FiltersBundle extends Bundle {

    public function build(ContainerBuilder $container) {
        parent::build($container);
        
        $container->addCompilerPass(new AddFiltersToProvider());
        $container->addCompilerPass(new AddFiltersToProviderPerList());
    }

}
