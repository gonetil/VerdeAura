<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sale
 *
 * @ORM\Table(name="sale")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SaleRepository")
 */
class Sale extends Movement
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
     * @var int
     *
     * @ORM\Column(name="item_count", type="integer")
     */
    private $itemCount;



    /**
    * @ORM\ManyToOne(targetEntity="Person",inversedBy="sales")
    */
    private $person;

    /**
     * Get id
     *
     * @return int
     */
     /**
     * Many Sales have Many PlateSets.
     * @ORM\ManyToMany(targetEntity="PlateSet")
     * @ORM\JoinTable(name="saless_plateSets",
     *      joinColumns={@ORM\JoinColumn(name="sale_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="plate_set_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $plate_sets;
    public function __construct()
   {
       $this->plate_sets = new \Doctrine\Common\Collections\ArrayCollection();
       $this->date =  new \DateTime();
   }

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

    /**
     * Get person
     *
     * @return person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set person
     *
     * @param \AppBundle\Entity\Person $person
     *
     * @return Sale
     */
    public function setPerson(\AppBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }
    /**
     * Add plate_set
     *
     * @param \AppBundle\Entity\PlateSet $plate_set
     *
     * @return Sale
     */
    public function addPlate(\AppBundle\Entity\PlateSet $plate_set)
    {
        $this->plate_sets[] = $plate_set;

        return $this;
    }

    /**
     * Remove plate_set
     *
     * @param \AppBundle\Entity\PlateSet $plate
     */
    public function removePlate(\AppBundle\Entity\PlateSet $plate_set)
    {
        $this->plate_sets->removeElement($plate_set);
    }

    /**
     * Get plate_set
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlateSets()
    {
        return $this->plate_sets;
    }
}
