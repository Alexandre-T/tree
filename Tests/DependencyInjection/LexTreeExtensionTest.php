<?php

/**
 * This file is part of the Lex TreeBundle.
 *
 * PHP version 5.6
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category  Testing
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2017 Alexandre Tranchant
 * @license   MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */

namespace Lex\TreeBundle\Tests\DependencyInjection;

use Lex\TreeBundle\DependencyInjection\LexTreeExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Tree extension unit test case.
 *
 * This file is testing the configuration.
 *
 * @category Testing
 *
 * @author   Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license  GNU General Public License, version 3
 *
 * @see     http://opensource.org/licenses/GPL-3.0
 */
class LexTreeExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * This test verify that by default the Tree Manager is loaded.
     */
    public function testDefault()
    {
        $container = new ContainerBuilder();
        $loader = new LexTreeExtension();
        $loader->load(array(array()), $container);
        $this->assertTrue($container->hasDefinition('lex_tree.tree-manager'), 'The Tree Manager is loaded');
    }
}
