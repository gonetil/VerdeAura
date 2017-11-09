<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class InvesmentExpenditureAdmin extends VerderAuraAbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('dateMovement')->add('amount')->add('description')->add('responsible')->add('entry');
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
