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


namespace Manager;

use Doctrine\ORM\EntityManager;
use Lex\TreeBundle\Entity\Tree;
use Lex\TreeBundle\Manager\TreeManager;
use Lex\TreeBundle\Tests\Functional\AbstractKernelTestCase;

/**
 * Tree Manager unit test.
 *
 * @category Testing
 *
 * @author   Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license  MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */
class TreeManagerTest extends AbstractKernelTestCase
{
    /**
     * Name of the Repository
     */
    const REPOSITORY = 'LexTreeBundle:Tree';

    /**
     * Tree Manager to test.
     *
     * @var TreeManager
     */
    private $manager;

    /**
     * Mock of the Doctrine\Orm\EntityManager
     *
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $entityManager;
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->entityManager = $this->getMockBuilder(EntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->manager = new TreeManager($this->entityManager, self::REPOSITORY);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->manager = null; // avoid memory leaks
    }

    /**
     * Test Manager->save()
     */
    public function testSave()
    {
        $tree = new Tree();

        //Method persist must be called one time with $tree as parameter
        $this->entityManager
            ->expects(self::once())
            ->method('persist')
            ->with($tree);

        //Method flush must be called one time with no parameter
        $this->entityManager
            ->expects(self::once())
            ->method('flush')
            ->with(null);

        $this->manager->save($tree);
    }
}
