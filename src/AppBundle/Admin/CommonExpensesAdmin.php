<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class CommonExpensesAdmin extends AbstractAdmin
{

  public function getNewInstance()
     {
         $commonExpenses = parent::getNewInstance();
         //$repository = $this->getDoctrine()->getRepository(PersonAdmin::class);
         $repository =$this->get('VerdeAuraServices')->getEntityManager()->getRepository('AppBundle:Person');
         $commonExpenses->setResponsible($repository->find(3));
         return $commonExpenses;
     }
  protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('dateMovement')->add('amount')->add('description')->add('responsible');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('dateMovement')->add('amount')->add('responsible');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('amount')->add('description')->add('responsible')->add('entry');
    }
}
