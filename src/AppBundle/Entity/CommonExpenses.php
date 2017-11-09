<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommonExpenses
 *
 * @ORM\Table(name="common_expenses")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommonExpensesRepository")
 */
class CommonExpenses extends Movement
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
     * Constructor
     */
    public function __construct()
    {
      parent::__construct();
      parent::setEntry(false);
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
}
