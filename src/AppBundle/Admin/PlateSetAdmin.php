<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PlateSetAdmin extends VerderAuraAbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('amount')->add('unitaryPrice')->add('discount')->add('plates')->add('client');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('amount')->add('client');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('amount')->add('unitaryPrice')->add('discount')->add('plates')->add('client');

    }
}
