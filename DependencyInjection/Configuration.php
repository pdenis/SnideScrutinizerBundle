<?php

/*
 * This file is part of the SnideScrutinizerBundle bundle.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\Bundle\ScrutinizerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('snide_scrutinizer')
            ->children()
                ->scalarNode('filesystem_cache_path')->end()
                ->arrayNode('repository')->isRequired()
                    ->children()
                        ->scalarNode('slug')->isRequired()->end()
                        ->scalarNode('type')->defaultValue('github')->validate()
                        ->ifNotInArray(array('github', 'bitbucket'))
                        ->thenInvalid('Invalid repository type "%s"')
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
