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

namespace Lex\TreeBundle\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Tree repository functional test case.
 *
 * This file is testing the configuration.
 *
 * @category Testing
 *
 * @author   Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license  MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */
abstract class AbstractKernelTestCase extends KernelTestCase
{
    /**
     * Load required files and return the classname.
     * I do not use AppKernel::class because I am testing it.
     *
     * @return string
     */
    public static function getKernelClass()
    {
        require_once __DIR__.'/app/AppKernel.php';

        return 'Lex\TreeBundle\Tests\Functional\app\AppKernel';
    }

    /**
     * Return the service corresponding to the specified name.
     *
     * @param string $name
     *
     * @return object
     */
    protected function getService($name)
    {
        return static::$kernel->getContainer()->get($name);
    }

    /**
     * Return the parameter corresponding to the specified name.
     *
     * @param string $name
     *
     * @return mixed
     */
    protected function getParameter($name)
    {
        return static::$kernel->getContainer()->getParameter($name);
    }

    /**
     * Return a private property corresponding to the specified name.
     * This method is using reflections.
     *
     * @param object $object
     * @param string $name
     *
     * @return mixed
     */
    protected function getPrivateProperty($object, $name)
    {
        $r = new \ReflectionObject($object);

        $p = $r->getProperty($name);
        $p->setAccessible(true);

        return $p->getValue($object);
    }
}
