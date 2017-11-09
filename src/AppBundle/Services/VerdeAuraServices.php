<?php
namespace AppBundle\Services;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;


/**
 *
 */
class VerdeAuraServices
{
  private $container;
  function __construct(Container $container)
  {
    $this->container=$container;
  }
  public function getContainer(){
    return $this->$container;
  }
  public function getDoctrine()
{
    return $this->getContainer()->get('doctrine');
}
public function getEntityManager(){
  return $this->getDoctrine()->getManager();
}

}
