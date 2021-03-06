<?php
namespace Gyman\Bundle\AppBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('gyman_app');

        $rootNode
            ->children()
                ->arrayNode('schedule_generator')
                    ->children()
                        ->scalarNode('phantom_path')->cannotBeEmpty()->end()
                        ->scalarNode('rasterize_script_path')->cannotBeEmpty()->end()
                        ->scalarNode('destination_directory')->cannotBeEmpty()->end()
                        ->scalarNode('filename')->cannotBeEmpty()->end()
                    ->end()
                ->end()
                ->scalarNode('galleryDir')->defaultValue('/uploads/gallery/')->end()
                ->scalarNode('noImage')->defaultValue('null')->end()
                ->scalarNode('galleryPath')->defaultValue('null')->end()
            ->end();

        return $treeBuilder;
    }
}
