<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoleRepository")
 */
class Role
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name='';

    /**
    * @ORM\ManyToMany(targetEntity="Person", mappedBy="roles")
    */
   private $persons;

   public function __construct() {
       $this->persons = new  \Doctrine\Common\Collections\ArrayCollection();
   }
   /**
    * Add person
    *
    * @param \AppBundle\Entity\Person $person
    *
    * @return Role
    */
   public function addPerson(\AppBundle\Entity\Person $person)
   {
       $this->persons[] = $person;

       return $this;
   }

   /**
    * Remove person
    *
    * @param \AppBundle\Entity\Person $person
    */
   public function removePerson(\AppBundle\Entity\Person $person)
   {
       $this->persons->removeElement($person);
   }

   /**
    * Get persons
    *
    * @return \Doctrine\Common\Collections\Collection
    */
   public function getPersons()
   {
       return $this->persons;
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
     * Set name
     *
     * @param string $name
     *
     * @return Role
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    public function __toString()
    {
      return $this->getName();
    }
}
