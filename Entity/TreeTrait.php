<?php
/**
 * Created by PhpStorm.
 * User: alexandre.tranchant
 * Date: 31/03/2017
 * Time: 14:07
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
trait TreeTrait
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
     * Name.
     *
     * @var string
     * @ORM\Column(type="string", nullable=false, name="tree_name")
     */
    protected $name;

    /**
     * Level 1 to x.
     *
     * @var int
     * @ORM\Column(type="integer", nullable=false, name="tree_lvl", options={"unsigned":true})
     */
    private $level;

    /**
     * Left born.
     *
     * @var int
     * @ORM\Column(type="integer", nullable=false, name="tree_lb", options={"unsigned":true})
     */
    private $left;

    /**
     * Right born.
     *
     * @var int
     * @ORM\Column(type="integer", nullable=false, name="tree_lr", options={"unsigned":true})
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
     * Set name.
     *
     * @param string $name
     *
     * @return Tree
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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