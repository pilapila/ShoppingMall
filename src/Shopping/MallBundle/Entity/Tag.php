<?php

namespace Shopping\MallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Tag
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity
 */
class Tag
{
    /**
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="tags")
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
     * @ORM\Column(name="tagname", type="string", length=255)
     */
    private $tagname;

    /**
     * @var string
     *
     * @ORM\Column(name="tagcomment", type="string", length=500)
     */
    private $tagcomment;

    public function __construct() {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tagname
     *
     * @param string $tagname
     * @return Tag
     */
    public function setTagname($tagname)
    {
        $this->tagname = $tagname;

        return $this;
    }

    /**
     * Get tagname
     *
     * @return string 
     */
    public function getTagname()
    {
        return $this->tagname;
    }

    /**
     * Set tagcomment
     *
     * @param string $tagcomment
     * @return Tag
     */
    public function setTagcomment($tagcomment)
    {
        $this->tagcomment = $tagcomment;

        return $this;
    }

    /**
     * Get tagcomment
     *
     * @return string 
     */
    public function getTagcomment()
    {
        return $this->tagcomment;
    }

    /**
     * Add products
     *
     * @param \Shopping\MallBundle\Entity\Product $products
     * @return Tag
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
        return (string) $this->getTagname();
    }
}
