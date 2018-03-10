<?php
namespace BalrogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MonsterAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Monster', ['class' => 'col-md-9'])
                ->add('id', 'integer', array(
                    'disabled' => true
                ))
                ->add('name', 'text')
                ->add('health', 'integer')
                ->add('damages', 'integer')
                ->add('attackName', 'text')
            ->end()
            ->with('Level', ['class' => 'col-md-3'])
                ->add('level', ModelType::class, [
                            'required' => false,
                            'expanded' => true,
                            'multiple' => false,
                        ])
            ->end();
        //->add('level', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id');
        $datagridMapper->add('health');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('id')
        ->addIdentifier('name')
        ->addIdentifier('attackName')
        ->addIdentifier('damages')
        ->addIdentifier('health')
        ->addIdentifier('level');
    }
}