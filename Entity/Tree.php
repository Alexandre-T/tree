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
 * @license  GNU General Public License, version 3
 *
 * @see     http://opensource.org/licenses/GPL-3.0
 *
 * @ORM\MappedSuperclass(repositoryClass="Lex\TreeBundle\Entity\Repository\TreeRepository")
 */
class Tree implements TreeInterface
{
    /**
     * Identifiant.
     *
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned":true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Level 1 to x.
     *
     * @var int
     * @ORM\Column(type="integer", nullable=false, name="dia_lvl", options={"unsigned":true})
     */
    private $level;

    /**
     * Left born.
     *
     * @var int
     * @ORM\Column(type="integer", nullable=false, name="dia_lb", options={"unsigned":true})
     */
    private $left;

    /**
     * Right born.
     *
     * @var int
     * @ORM\Column(type="integer", nullable=false, name="dia_lr", options={"unsigned":true})
     */
    private $right;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set level.
     *
     * @param int $level
     *
     * @return TreeInterface
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level.
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set left.
     *
     * @param int $left
     *
     * @return TreeInterface
     */
    public function setLeft($left)
    {
        $this->left = $left;

        return $this;
    }

    /**
     * Get left.
     *
     * @return int
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * Set right.
     *
     * @param int $right
     *
     * @return TreeInterface
     */
    public function setRight($right)
    {
        $this->right = $right;

        return $this;
    }

    /**
     * Get right.
     *
     * @return int
     */
    public function getRight()
    {
        return $this->right;
    }
}
