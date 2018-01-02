<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: uirapuru
 * Date: 20.03.16
 * Time: 01:29.
 */

namespace Gyman\Bundle\ReportsBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ReportsGeneratorStrategies implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('gyman.reports.generator')) {
            return;
        }

        $definition = $container->getDefinition('gyman.reports.generator');

        $taggedServices = $container->findTaggedServiceIds('reports.strategy');

        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                $definition->addMethodCall('addStrategy', [
                    $attributes['alias'],
                    new Reference($id),
                ]);
            }
        }
    }
}
