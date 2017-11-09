<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class VerderAuraAbstractAdmin extends AbstractAdmin {

  protected function getVerdeAura() {
    return   $this->getContainer()->get('VerdeAuraServices');
  }
  protected function getContainer() {
    return $this->getConfigurationPool()->getContainer();
  }

}
