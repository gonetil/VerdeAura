<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SaleAdmin extends VerderAuraAbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('dateMovement')->add('amount')->add('description')->add('responsible')->add('itemCount')->add('entry');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('dateMovement')->add('amount')->add('responsible');
    }

    protected function configureListFields(ListMapper $listMapper)
    {

        var_dump( $this->getVerdeAura()->gonetil());
        $ci = $this->getContainer()->get('admin.capital_investment');
        var_dump($ci); die;
        $listMapper->addIdentifier('amount')->add('description')->add('responsible')->add('entry')->add('addressee')->add('itemCount');
    }
}
