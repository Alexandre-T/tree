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


namespace Lex\TreeBundle\Tests\Functional\Manager;

use Lex\TreeBundle\Entity\Tree;
use Lex\TreeBundle\Exception\TreeNotFoundException;
use Lex\TreeBundle\Manager\TreeManager;
use Lex\TreeBundle\Tests\Functional\AbstractKernelTestCase;

/**
 * Tree Manager functional test.
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
     * Test TreeManager->getAllChildren.
     */
    public function testGetAllChildren()
    {
        $expectedCount = 6;
        $terrestre = $this->manager->getByName('terrestre');
        $trees = $this->manager->getAllChildren($terrestre);

        self::assertEquals($expectedCount, count($trees));
        $names = self::getNames($trees);
        self::assertContains('vélo', $names);
        self::assertContains('voiture', $names);
        self::assertContains('camion', $names);
        self::assertContains('moto', $names);
        self::assertContains('trail', $names);
    }

    /**
     * Test GetOneChildren.
     */
    public function testGetChildren()
    {
        $expectedCount = 4;
        $terrestre = $this->manager->getByName('terrestre');
        $trees = $this->manager->getChildren($terrestre);
        self::assertEquals($expectedCount, count($trees));
        $names = self::getNames($trees);
        self::assertContains('vélo', $names);
        self::assertContains('voiture', $names);
        self::assertContains('camion', $names);
        self::assertContains('moto', $names);
    }

    /**
     * Test GetOneComplement.
     */
    public function testGetComplement()
    {
        $expectedCount = 15;
        $terrestre = $this->manager->getByName('terrestre');
        $trees = $this->manager->getComplement($terrestre);
        self::assertEquals($expectedCount, count($trees));

        $names = self::getNames($trees);
        self::assertContains('transport', $names);
        self::assertContains('aérien', $names);
        self::assertContains('planeur', $names);
        self::assertContains('parachute', $names);
        self::assertContains('hélicoptère', $names);
        self::assertContains('fusée', $names);
        self::assertContains('ulm', $names);
        self::assertContains('avion', $names);
        self::assertContains('militaire', $names);
        self::assertContains('tourisme', $names);
        self::assertContains('civil', $names);
        self::assertContains('marin', $names);
        self::assertContains('planche à voile', $names);
        self::assertContains('paquebot', $names);
        self::assertContains('voilier', $names);
    }

    /**
     * Test GetLeaves.
     */
    public function testGetLeaves()
    {
        $expectedCount = 16;
        $trees = $this->manager->getLeaves();
        self::assertEquals($expectedCount, count($trees));

        $names = self::getNames($trees);
        self::assertContains('planeur', $names);
        self::assertContains('parachute', $names);
        self::assertContains('hélicoptère', $names);
        self::assertContains('fusée', $names);
        self::assertContains('ulm', $names);
        self::assertContains('militaire', $names);
        self::assertContains('tourisme', $names);
        self::assertContains('civil', $names);
        self::assertContains('vélo', $names);
        self::assertContains('voiture', $names);
        self::assertContains('camion', $names);
        self::assertContains('side-car', $names);
        self::assertContains('trail', $names);
        self::assertContains('planche à voile', $names);
        self::assertContains('paquebot', $names);
        self::assertContains('voilier', $names);

        //Test with a parameter
        $expectedCount = 5;
        $terrestre = $this->manager->getByName('terrestre');
        $trees = $this->manager->getLeaves($terrestre);
        self::assertEquals($expectedCount, count($trees));

        $names = self::getNames($trees);
        self::assertContains('vélo', $names);
        self::assertContains('voiture', $names);
        self::assertContains('camion', $names);
        self::assertContains('side-car', $names);
        self::assertContains('trail', $names);
    }

    /**
     * Test GetNodes.
     */
    public function testGetNodes()
    {
        $expectedCount = 6;
        $trees = $this->manager->getNodes();
        self::assertEquals($expectedCount, count($trees));

        $names = self::getNames($trees);
        self::assertContains('transport', $names);
        self::assertContains('aérien', $names);
        self::assertContains('terrestre', $names);
        self::assertContains('marin', $names);
        self::assertContains('avion', $names);
        self::assertContains('moto', $names);

        //Test with a parameter
        $expectedCount = 1;
        $terrestre = $this->manager->getByName('terrestre');
        $trees = $this->manager->getNodes($terrestre);
        self::assertEquals($expectedCount, count($trees));

        $names = self::getNames($trees);
        self::assertContains('moto', $names);
    }

    /**
     * Test GetParent.
     */
    public function testGetParent()
    {
        //Test with a parameter
        $expected = 'moto';
        $trail = $this->manager->getByName('trail');
        $tree = $this->manager->getParent($trail);
        self::assertInstanceOf(Tree::class, $tree);
        self::assertEquals($expected, $tree->getName());
    }

    /**
     * Test GetParent.
     */
    public function testGetParents()
    {
        $expected = 3;
        $trail = $this->manager->getByName('trail');
        /** @var Tree $tree */
        $trees = $this->manager->getParents($trail);
        self::assertEquals($expected, count($trees));

        $names = self::getNames($trees);
        self::assertContains('moto', $names);
        self::assertContains('terrestre', $names);
        self::assertContains('transport', $names);
    }

    /**
     * Test GetRoot.
     */
    public function testGetRoot()
    {
        $expected = $this->manager->getByName('transport');
        $actual = $this->manager->getRoot();
        self::assertEquals($expected, $actual);
    }

    /**
     * Test TreeManager->getByName()
     */
    public function testGetByName()
    {
        /** @var Tree $terrestre */
        $terrestre = $this->manager->getByName('terrestre');
        self::assertInstanceOf(Tree::class, $terrestre);
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
        self::assertInstanceOf(Tree::class, $actual);
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

    /**
     * Return an array of string names
     * @param array $trees
     * @return array $names
     */
    private static function getNames(array $trees)
    {
        $names = [];
        foreach ($trees as $tree) {
            $names[]=$tree->getName();
        }
        return $names;
    }
}
