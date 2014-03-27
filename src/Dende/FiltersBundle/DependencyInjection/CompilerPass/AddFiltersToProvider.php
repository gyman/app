<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dende\FiltersBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Description of AddFiltersToProvider
 *
 * @author uirapuru
 */
class AddFiltersToProvider implements CompilerPassInterface {

    public function process(ContainerBuilder $container) {
        $filterIds = $container->findTaggedServiceIds("filter");
        $filterProviderDefinition = $container->getDefinition("filter_provider");

        foreach ($filterIds as $id => $attributes) {
            $filterProviderDefinition->addMethodCall("addFilter", array(new Reference($id)));
        }
    }

}
