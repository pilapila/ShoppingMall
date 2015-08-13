<?php

namespace Shopping\MallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    private $products;


    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="categoryname", type="string", length=255)
     */
    private $categoryname;

    /**
     * @var string
     *
     * @ORM\Column(name="categorycomment", type="string", length=500)
     */
    private $categorycomment;
    
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    
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
     * Set categoryname
     *
     * @param string $categoryname
     * @return Category
     */
    public function setCategoryname($categoryname)
    {
        $this->categoryname = $categoryname;

        return $this;
    }

    /**
     * Get categoryname
     *
     * @return string 
     */
    public function getCategoryname()
    {
        return $this->categoryname;
    }

    /**
     * Set categorycomment
     *
     * @param string $categorycomment
     * @return Category
     */
    public function setCategorycomment($categorycomment)
    {
        $this->categorycomment = $categorycomment;

        return $this;
    }

    /**
     * Get categorycomment
     *
     * @return string 
     */
    public function getCategorycomment()
    {
        return $this->categorycomment;
    }

    /**
     * Add products
     *
     * @param \Shopping\MallBundle\Entity\Product $products
     * @return Category
     */
    public function addProduct(\Shopping\MallBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Shopping\MallBundle\Entity\Product $products
     */
    public function removeProduct(\Shopping\MallBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
    
    public function __toString()
    {
        return (string) $this->getCategoryname();
    }
}
