<?php

namespace Renus\LastTweetBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('renus_last_tweet');


        $rootNode
            ->children()
                ->arrayNode('twitter')
                    ->children()
                        ->scalarNode('consumer_key')->isRequired()->end()
                        ->scalarNode('consumer_secret')->isRequired()->end()
                        ->scalarNode('token')->isRequired()->end()
                        ->scalarNode('token_secret')->isRequired()->end()
                    ->end()
                ->end() // twitter
                ->arrayNode('template')
                    ->children()
                        ->scalarNode('path')->end()
                ->end() // template
            ->end()
        ;

        return $treeBuilder;
    }
}
