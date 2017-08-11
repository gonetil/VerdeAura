<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 *
 * @ORM\Table(name="payment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaymentRepository")
 */
class Payment extends Movement
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
     * One Movement has One addressee.
     * @ORM\OneToOne(targetEntity="Person", mappedBy="Payment")
     */
    private $addressee;


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
     * Get addressee
     *
     * @return person
     */
    public function getAddressee()
    {
        return $this->addressee;
    }

    /**
     * Set addressee
     *
     * @param \AppBundle\Entity\Person $person
     *
     * @return Payment
     */
    public function setResponsible(\AppBundle\Entity\Person $addressee = null)
    {
        $this->addressee = $addressee;

        return $this;
    }
}
