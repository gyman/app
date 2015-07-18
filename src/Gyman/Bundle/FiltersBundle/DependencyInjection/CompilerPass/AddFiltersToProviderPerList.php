<?php

namespace Gyman\Bundle\FiltersBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @codeCoverageIgnore
 */
class AddFiltersToProviderPerList implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $lists = $container->getParameter('filter_provider.lists');

        foreach ($lists as $listName) {
            $filterIds = $container->findTaggedServiceIds('filter.list.' . $listName);
            $filterProviderDefinition = $container->getDefinition('filter_provider');

            foreach ($filterIds as $id => $attributes) {
                $filterProviderDefinition->addMethodCall('addFilterForList', [
                    $listName,
                    new Reference($id),
                ]);
            }
        }
    }
}
