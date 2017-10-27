<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movement
 *
 * @ORM\Table(name="movement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MovementRepository")
 * @ORM\InheritanceType ("JOINED")
 * @ORM\DiscriminatorColumn(name="tipoMov", type="string")
 * @ORM\DiscriminatorMap({"capitalInvestment"="CapitalInvestment", "commonexpenses"="CommonExpenses","invesmentIexpenditure"="InvesmentExpenditure","payment"="Payment","sale"="Sale"})
 */
abstract class Movement
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_movement", type="date")
     */
    private $dateMovement;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=0)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="entry", type="boolean")
     */
    private $entry;
    /**
     * One Movment has One responsible.
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="sales")
     */
    private $responsible;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dateMovement =  new \DateTime();
      
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
     * Set dateMovement
     *
     * @param \DateTime $dateMovement
     *
     * @return Movement
     */
    public function setDateMovement($dateMovement)
    {
        $this->dateMovement = $dateMovement;

        return $this;
    }

    /**
     * Get dateMovement
     *
     * @return \DateTime
     */
    public function getDateMovement()
    {
        return $this->dateMovement;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Movement
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Movement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set entry
     *
     * @param boolean $entry
     *
     * @return Movement
     */
    public function setEntry($entry)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * Get entry
     *
     * @return bool
     */
    public function getEntry()
    {
        return $this->entry;
    }
    /**
     * Get person
     *
     * @return person
     */
    public function getResponsible()
    {
        return $this->responsible;
    }

    /**
     * Set person
     *
     * @param \AppBundle\Entity\Person $person
     *
     * @return Sale
     */
    public function setResponsible(\AppBundle\Entity\Person $responsible = null)
    {
        $this->responsible = $responsible;

        return $this;
    }
}
