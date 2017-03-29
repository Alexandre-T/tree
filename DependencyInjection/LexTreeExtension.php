<?php

/**
 * This file is part of the Lex TreeBundle.
 *
 * PHP version 5.6
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category  Extension
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2017 Alexandre Tranchant
 * @license   MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */

namespace Lex\TreeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @see http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class LexTreeExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @param array            $configs   An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
