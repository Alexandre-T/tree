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
use Lex\TreeBundle\Entity\TreeInterface;
use Lex\TreeBundle\Exception\TreeNotFoundException;
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
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        self::bootKernel();

        $entityManager = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->manager = new TreeManager($entityManager, self::REPOSITORY);
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
     * Test TreeManager->getByName()
     */
    public function testGetByName()
    {
        /** @var TreeInterface $terrestre */
        $terrestre = $this->manager->getByName('terrestre');
        self::assertInstanceOf(TreeInterface::class, $terrestre);
        self::assertEquals('terrestre', $terrestre->getName());
    }

    /**
     * Test TreeManager->testGetByName with non existent entity().
     */
    public function testGetByNameWithNonExistentEntity()
    {
        self::expectExceptionMessage('Tree abcd is non-existant');
        self::expectException(TreeNotFoundException::class);
        $this->manager->getByName('abcd');
    }

    /**
     * Test TreeManager->getById().
     */
    public function testGetById()
    {
        $expected = $this->manager->getByName('terrestre');
        $actual = $this->manager->getById($expected->getId());
        self::assertInstanceOf(TreeInterface::class, $actual);
        self::assertSame($expected, $actual);
    }

    /**
     * Test TreeManager->getById() with non existent entity.
     */
    public function testGetByIdWithNonExistentEntity()
    {
        self::expectExceptionMessage('There is no tree with -1 as id');
        self::expectException(TreeNotFoundException::class);
        $this->manager->getById('-1');
    }

}
