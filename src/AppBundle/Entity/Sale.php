<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sale
 *
 * @ORM\Table(name="sale")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SaleRepository")
 */
class Sale
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="item_count", type="integer")
     */
    private $itemCount;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     */
    private $comments;

    /**
    * @ORM\ManyToOne(targetEntity="Seller",inversedBy="sales")
    */
    private $seller;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Sale
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set itemCount
     *
     * @param integer $itemCount
     *
     * @return Sale
     */
    public function setItemCount($itemCount)
    {
        $this->itemCount = $itemCount;

        return $this;
    }

    /**
     * Get itemCount
     *
     * @return int
     */
    public function getItemCount()
    {
        return $this->itemCount;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return Sale
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return Sale
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->seller = new \Doctrine\Common\Collections\ArrayCollection();
        $this->date =  new \DateTime();
    }

    /**
     * Add seller
     *
     * @param \AppBundle\Entity\Seller $seller
     *
     * @return Sale
     */
    public function addSeller(\AppBundle\Entity\Seller $seller)
    {
        $this->seller[] = $seller;

        return $this;
    }

    /**
     * Remove seller
     *
     * @param \AppBundle\Entity\Seller $seller
     */
    public function removeSeller(\AppBundle\Entity\Seller $seller)
    {
        $this->seller->removeElement($seller);
    }

    /**
     * Get seller
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * Set seller
     *
     * @param \AppBundle\Entity\Seller $seller
     *
     * @return Sale
     */
    public function setSeller(\AppBundle\Entity\Seller $seller = null)
    {
        $this->seller = $seller;

        return $this;
    }
}
