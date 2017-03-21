<?php
namespace Lex\TreeBundle\Tests\DependencyInjection;

use Lex\TreeBundle\DependencyInjection\LexTreeExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class KnpMenuExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $container = new ContainerBuilder();
        $loader = new LexTreeExtension();
        $loader->load(array(array()), $container);
        $this->assertTrue($container->hasDefinition('lex_tree.tree-manager'), 'The Tree Manager is loaded');
    }
}