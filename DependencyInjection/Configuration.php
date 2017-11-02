<?php

namespace Algolia\SearchBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('algolia_search');

        $rootNode
            ->children()
                ->scalarNode('prefix')
                    ->defaultValue('coolSF_')
                ->end()
                ->arrayNode('indices')
                    ->arrayPrototype()
                        ->children()
                            ->scalarNode('name')->end()
                            ->scalarNode('class')->end()
                            ->scalarNode('normalizer')->end()
                        ->end()
                    ->end()
                ->end() // indices
            ->end();

        return $treeBuilder;
    }
}
