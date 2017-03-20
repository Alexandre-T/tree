<?php
namespace Lex\TreeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass(repositoryClass="Lex\TreeBundle\Entity\Repository\TreeRepository")
 */
abstract class AbstractTree
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned":true})
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false, name="dia_lvl", options={"unsigned":true})
     */
    private $level;

    /**
     * 
     * @ORM\Column(type="integer", nullable=false, name="dia_lb", options={"unsigned":true})
     */
    private $left;

    /**
     * 
     * @ORM\Column(type="integer", nullable=false, name="dia_lr", options={"unsigned":true})
     */
    private $right;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return AbstractTree
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set left
     *
     * @param integer $left
     *
     * @return AbstractTree
     */
    public function setLeft($left)
    {
        $this->left = $left;

        return $this;
    }

    /**
     * Get left
     *
     * @return integer
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * Set right
     *
     * @param integer $right
     *
     * @return AbstractTree
     */
    public function setRight($right)
    {
        $this->right = $right;

        return $this;
    }

    /**
     * Get right
     *
     * @return integer
     */
    public function getRight()
    {
        return $this->right;
    }
}
