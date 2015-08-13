<?php

namespace Shopping\MallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Product
 *
 * @ORM\Table(name="products")
 * @ORM\Entity
 */
class Product
{
    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="products")
     * @ORM\JoinTable(name="products_tags")
     */
    private $tags;


    /**
     * @var Category
     * 
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;
    
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
     * @ORM\Column(name="productname", type="string", length=255)
     */
    private $productname;

    /**
     * @var string
     *
     * @ORM\Column(name="productpic", type="string", length=255, nullable=true)
     */
    private $productpic;

    /**
     * @var string
     *
     * @ORM\Column(name="productprice", type="string", length=255)
     */
    private $productprice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="productdate", type="date")
     */
    private $productdate;

    /**
     * @var string
     *
     * @ORM\Column(name="productcomment", type="string", length=500, nullable=true)
     */
    private $productcomment;
    

    public function __construct() {
        $this->tags = new ArrayCollection();
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
     * Set productname
     *
     * @param string $productname
     * @return Product
     */
    public function setProductname($productname)
    {
        $this->productname = $productname;

        return $this;
    }

    /**
     * Get productname
     *
     * @return string 
     */
    public function getProductname()
    {
        return $this->productname;
    }

    /**
     * Set productpic
     *
     * @param string $productpic
     * @return Product
     */
    public function setProductpic($productpic)
    {
        $this->productpic = $productpic;

        return $this;
    }

    /**
     * Get productpic
     *
     * @return string 
     */
    public function getProductpic()
    {
        return $this->productpic;
    }

    /**
     * Set productprice
     *
     * @param string $productprice
     * @return Product
     */
    public function setProductprice($productprice)
    {
        $this->productprice = $productprice;

        return $this;
    }

    /**
     * Get productprice
     *
     * @return string 
     */
    public function getProductprice()
    {
        return $this->productprice;
    }

    /**
     * Set productdate
     *
     * @param \DateTime $productdate
     * @return Product
     */
    public function setProductdate($productdate)
    {
        $this->productdate = $productdate;

        return $this;
    }

    /**
     * Get productdate
     *
     * @return \DateTime 
     */
    public function getProductdate()
    {
        return $this->productdate;
    }

    /**
     * Set productcomment
     *
     * @param string $productcomment
     * @return Product
     */
    public function setProductcomment($productcomment)
    {
        $this->productcomment = $productcomment;

        return $this;
    }

    /**
     * Get productcomment
     *
     * @return string 
     */
    public function getProductcomment()
    {
        return $this->productcomment;
    }

    /**
     * Set category
     *
     * @param \Shopping\MallBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\Shopping\MallBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Shopping\MallBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add tags
     *
     * @param \Shopping\MallBundle\Entity\Tag $tags
     * @return Product
     */
    public function addTag(\Shopping\MallBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \Shopping\MallBundle\Entity\Tag $tags
     */
    public function removeTag(\Shopping\MallBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }
    
    public function __toString()
    {
        return (string) $this->getProductname();
    }
}
