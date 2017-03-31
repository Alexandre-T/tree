<?php

/**
 * This file is part of the Lex TreeBundle.
 *
 * PHP version 5.6
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category  Entity
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2017 Alexandre Tranchant
 * @license   MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */

namespace Lex\TreeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tree (minimum) Entity implementing ITree.
 *
 * @category Entity
 *
 * @author   Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license  MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 *
 * @ORM\Entity(repositoryClass="Lex\TreeBundle\Entity\Repository\TreeRepository")
 * @ORM\Table(
 *     name="lex_tree",
 *     indexes={
 *         @ORM\Index(name="LevelIndex", columns={"tree_lvl","tree_lb","tree_lr"}),
 *         @ORM\Index(name="BornIndex", columns={"tree_lb","tree_lr"}),
 *         @ORM\Index(name="NameIndex", columns={"tree_name"})
 *     }
 * )
 */
class Tree implements TreeInterface
{
    use TreeTrait;
}
