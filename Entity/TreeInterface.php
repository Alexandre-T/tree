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

/**
 * Tree Interface needed to be used by TreeRepository.
 *
 * @category Entity
 *
 * @author   Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license  GNU General Public License, version 3
 *
 * @see     http://opensource.org/licenses/GPL-3.0
 */
interface TreeInterface
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Set level.
     *
     * @param int $level
     *
     * @return TreeInterface
     */
    public function setLevel($level);

    /**
     * Get level.
     *
     * @return int
     */
    public function getLevel();

    /**
     * Set left born.
     *
     * @param int $left
     *
     * @return TreeInterface
     */
    public function setLeft($left);

    /**
     * Get left born.
     *
     * @return int
     */
    public function getLeft();

    /**
     * Set right born.
     *
     * @param int $right
     *
     * @return TreeInterface
     */
    public function setRight($right);

    /**
     * Get right born.
     *
     * @return int
     */
    public function getRight();
}
