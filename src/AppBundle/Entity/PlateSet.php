<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\PlateSet;

/**
 * PlateSet
 *
 * @ORM\Table(name="plate_set")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlateSetRepository")
 */
class PlateSet
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
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(name="unitaryPrice", type="float")
     */
    private $unitaryPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="discount", type="float")
     */
    private $discount;
    /**
     * Many PLateSer have Many plates.
     * @ORM\ManyToMany(targetEntity="Plate")
     * @ORM\JoinTable(name="platesets_plates",
     *      joinColumns={@ORM\JoinColumn(name="plate_set_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="plate_id", referencedColumnName="id", unique=true)}
     *      )
     */

     private $plates;
     /**
     * One PlateSet has One Client.
     * @ORM\OneToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;


     public function __construct()
    {
        $this->plates = new \Doctrine\Common\Collections\ArrayCollection();
    }
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
     * Set amount
     *
     * @param float $amount
     *
     * @return PlateSet
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
     * Set unitaryPrice
     *
     * @param float $unitaryPrice
     *
     * @return PlateSet
     */
    public function setUnitaryPrice($unitaryPrice)
    {
        $this->unitaryPrice = $unitaryPrice;

        return $this;
    }

    /**
     * Get unitaryPrice
     *
     * @return float
     */
    public function getUnitaryPrice()
    {
        return $this->unitaryPrice;
    }

    /**
     * Set discount
     *
     * @param float $discount
     *
     * @return PlateSet
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return float
     */
    public function getDiscount()
    {
        return $this->discount;
    }
    /**
     * Add plate
     *
     * @param \AppBundle\Entity\Plate $plate
     *
     * @return PlateSet
     */
    public function addPlate(\AppBundle\Entity\Plate $plate)
    {
        $this->plates[] = $plate;

        return $this;
    }

    /**
     * Remove plate
     *
     * @param \AppBundle\Entity\Plate $plate
     */
    public function removePlate(\AppBundle\Entity\Plate $plate)
    {
        $this->plates->removeElement($plate);
    }

    /**
     * Get plate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlates()
    {
        return $this->plates;
    }
}
