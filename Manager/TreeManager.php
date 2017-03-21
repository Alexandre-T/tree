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

namespace Lex\TreeBundle\Service;

use Doctrine\ORM\EntityManager;
use Lex\TreeBundle\Entity\Repository\TreeRepository;

/**
 * Class TreeManager.
 *
 * @category Manager
 *
 * @author   Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license  MIT
 *
 * https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */
class TreeManager
{
    /**
     * @var EntityManager
     */
    public $entityManager;

    /**
     * @var TreeRepository
     */
    private $repository;

    /**
     * TreeManager constructor.
     *
     * @param EntityManager $entityManager
     * @param string        $repository
     */
    public function __construct(EntityManager $entityManager, $repository)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository($repository);
    }

    /**
     * Save game.
     *
     * @param $entity (the tree)
     */
    public function save($entity)
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }
}
