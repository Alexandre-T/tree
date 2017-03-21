<?php
/**
 * Created by PhpStorm.
 * User: alexandre.tranchant
 * Date: 21/03/2017
 * Time: 14:45
 */

namespace Lex\TreeBundle\Entity;


interface ITree
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return AbstractTree
     */
    public function setLevel($level);

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel();

    /**
     * Set left
     *
     * @param integer $left
     *
     * @return AbstractTree
     */
    public function setLeft($left);

    /**
     * Get left
     *
     * @return integer
     */
    public function getLeft();

    /**
     * Set right
     *
     * @param integer $right
     *
     * @return AbstractTree
     */
    public function setRight($right);

    /**
     * Get right
     *
     * @return integer
     */
    public function getRight();
}