<?php
/**
 * This file is part of the Lex TreeBundle.
 *
 * PHP version 5.6
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category  Repository
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2017 Alexandre Tranchant
 * @license   MIT
 *
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

    /**
     * TreeManager constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager, $repository)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository($repository);
    }

    /**
     * Save game.
     *
     * @param $entity (the game)
     */
    public function save($entity)
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }
}
