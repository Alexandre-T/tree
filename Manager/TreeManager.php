<?php
/**
 * This file is part of the Lex TreeBundle.
 *
 * PHP version 5.6
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category  Manager
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2017 Alexandre Tranchant
 * @license   MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */

namespace Lex\TreeBundle\Manager;

use Doctrine\ORM\EntityManager;
use Lex\TreeBundle\Entity\Repository\TreeRepository;
use Lex\TreeBundle\Entity\TreeInterface;
use Lex\TreeBundle\Exception\TreeNotFoundException;

/**
 * Tree Manager to manipulate Tree via TreeRepository.
 *
 * @category Manager
 *
 * @author   Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license  MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */
class TreeManager
{
    /**
     * Entity Mangager.
     *
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Repository to manipulate Tree entities.
     *
     * @var TreeRepository
     */
    private $repository;

    /**
     * TreeManager constructor.
     * @param EntityManager $entityManager
     * @param $repository
     */
    public function __construct(EntityManager $entityManager, $repository)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository($repository);
    }

    /**
     * Get a TreeInterface instance or throws TreeNotFoundException.
     *
     * @param $id
     * @return object
     * @throws TreeNotFoundException
     */
    public function getById($id)
    {
        $tree = $this->repository->find($id);

        if ($tree instanceof TreeInterface)
        {
            return $tree;
        }
        throw new TreeNotFoundException(sprintf('There is no tree with %d as id', $id));
    }

    /**
     * Get a TreeInterface instance or throws TreeNotFoundException.
     *
     * @param $name
     * @return object
     * @throws TreeNotFoundException
     */
    public function getByName($name)
    {
        $tree = $this->repository->findOneByName($name);

        if ($tree instanceof TreeInterface)
        {
            return $tree;
        }
        throw new TreeNotFoundException(sprintf('Tree %s is non-existant', $name));
    }

    /**
     * Save a tree interface.
     *
     * @param TreeInterface $tree
     */
    public function save(TreeInterface $tree)
    {
        $this->entityManager->persist($tree);
        $this->entityManager->flush();
    }
}
