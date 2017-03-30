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

namespace Lex\TreeBundle\Tests\Entity\Repository;

use Lex\TreeBundle\Entity\Repository\TreeRepository;
use Lex\TreeBundle\Entity\Tree;
use Lex\TreeBundle\Tests\Functional\AbstractKernelTestCase;

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
class TreeRepositoryTest extends AbstractKernelTestCase
{
    /**
     * Doctrine Entity Manager.
     *
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * Tree repositoty.
     *
     * @var TreeRepository
     */
    private $repository;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->entityManager = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->repository = $this->entityManager->getRepository('LexTreeBundle:Tree');
    }

    /**
     * Test FindAll method.
     */
    public function testFindAll()
    {
        $trees = $this->repository->findAll();
        self::assertGreaterThan(1, count($trees));
    }

    /**
     * Test FindOneByName.
     */
    public function testFindOneByName()
    {
        $expected = 'terrestre';
        /** @var Tree $tree */
        $tree = $this->repository->findOneByName('terrestre');
        self::assertInstanceOf(Tree::class, $tree);
        self::assertEquals($expected, $tree->getName());
    }

    /**
     * Test FindAllChildren.
     */
    public function testFindAllChildren()
    {
        $expectedCount = 6;
        $terrestre = $this->repository->findOneByName('terrestre');
        $trees = $this->repository->findAllChildren($terrestre);
        self::assertEquals($expectedCount, count($trees));
        $names = self::getNames($trees);
        self::assertContains('vélo', $names);
        self::assertContains('voiture', $names);
        self::assertContains('camion', $names);
        self::assertContains('moto', $names);
        self::assertContains('trail', $names);
    }

    /**
     * Test FindOneChildren.
     */
    public function testFindChildren()
    {
        $expectedCount = 4;
        $terrestre = $this->repository->findOneByName('terrestre');
        $trees = $this->repository->findChildren($terrestre);
        self::assertEquals($expectedCount, count($trees));
        $names = self::getNames($trees);
        self::assertContains('vélo', $names);
        self::assertContains('voiture', $names);
        self::assertContains('camion', $names);
        self::assertContains('moto', $names);
    }

    /**
     * Test FindOneComplement.
     */
    public function testFindComplement()
    {
        $expectedCount = 15;
        $terrestre = $this->repository->findOneByName('terrestre');
        $trees = $this->repository->findComplement($terrestre);
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
     * Test FindLeaves.
     */
    public function testFindLeaves()
    {
        $expectedCount = 16;
        $trees = $this->repository->findLeaves();
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
        $terrestre = $this->repository->findOneByName('terrestre');
        $trees = $this->repository->findLeaves($terrestre);
        self::assertEquals($expectedCount, count($trees));

        $names = self::getNames($trees);
        self::assertContains('vélo', $names);
        self::assertContains('voiture', $names);
        self::assertContains('camion', $names);
        self::assertContains('side-car', $names);
        self::assertContains('trail', $names);
    }

    /**
     * Test FindNodes.
     */
    public function testFindNodes()
    {
        $expectedCount = 6;
        $trees = $this->repository->findNodes();
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
        $terrestre = $this->repository->findOneByName('terrestre');
        $trees = $this->repository->findNodes($terrestre);
        self::assertEquals($expectedCount, count($trees));

        $names = self::getNames($trees);
        self::assertContains('moto', $names);
    }

    /**
     * Test FindParent.
     */
    public function testFindParent()
    {
        //Test with a parameter
        $expected = 'moto';
        $trail = $this->repository->findOneByName('trail');
        /** @var Tree $tree */
        $tree = $this->repository->findParent($trail);
        self::assertInstanceOf(Tree::class, $tree);
        self::assertEquals($expected, $tree->getName());
    }

    /**
     * Test FindParent.
     */
    public function testFindParents()
    {
        $expected = 3;
        $trail = $this->repository->findOneByName('trail');
        /** @var Tree $tree */
        $trees = $this->repository->findParents($trail);
        self::assertEquals($expected, count($trees));

        $names = self::getNames($trees);
        self::assertContains('moto', $names);
        self::assertContains('terrestre', $names);
        self::assertContains('transport', $names);
    }

    /**
     * Test FindRoot.
     */
    public function testFindRoot()
    {
        $expected = $this->repository->findOneByName('transport');
        $actual = $this->repository->findRoot();
        self::assertEquals($expected, $actual);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null; // avoid memory leaks
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
