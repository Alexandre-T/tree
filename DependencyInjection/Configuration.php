<?php

/**
 * This file is part of the Lex TreeBundle.
 *
 * PHP version 5.6
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category  DependencyInjection
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2017 Alexandre Tranchant
 * @license   MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */

namespace Lex\TreeBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('lex_tree');

        $rootNode
            ->children()
                ->arrayNode('tree-manager')
                    ->children()
                        ->scalarNode('class')
                            ->defaultValue('Lex\TreeBundle\Manager\TreeManager')
                            ->end()
                        ->arrayNode('arguments')
                            ->children()
                                ->variableNode('entityManager')
                                    ->defaultValue('@doctrine.orm.entity_manager')
                                    ->end()
                                ->scalarNode('RepositoryName')
                                    ->defaultValue('TreeBundle:Tree')
                                    ->end()
                            ->end() //children of arguments
                        ->end() //arguments
                    ->end() //children of tree-manager
                ->end()//tree-manager
            ->end()//children of tree_node
        ;

        return $treeBuilder;
    }
}
