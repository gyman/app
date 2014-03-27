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
class AddFiltersToProviderPerList implements CompilerPassInterface {

    public function process(ContainerBuilder $container) {
        $lists = $container->getParameter("filter_provider.lists");

        foreach ($lists as $tag) {
            $filterIds = $container->findTaggedServiceIds($tag);
            $filterProviderDefinition = $container->getDefinition("filter_provider");

            foreach ($filterIds as $id => $attributes) {
                $filterProviderDefinition->addMethodCall("addFilterForList", array(new Reference($id),$tag));
            }
        }
    }

}
