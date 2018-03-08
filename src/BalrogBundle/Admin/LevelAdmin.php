<?php
namespace BalrogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LevelAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->with('Level', ['class' => 'col-md-12'])
            ->add('id', 'integer', array(
                'disabled' => true
            ))
            ->add('name', 'text')
            ->add('difficulty', 'integer')
        ->end()
        ->with('Monstres', ['class' => 'col-md-6'])
            ->add('monsters', ModelType::class, [
                            'required' => false,
                            'expanded' => true,
                            'multiple' => true,
                        ])
        ->end()
        ->with('Equipements', ['class' => 'col-md-6'])
            ->add('equipments', ModelType::class, [
                            'required' => false,
                            'expanded' => true,
                            'multiple' => true,
                        ])
        ->end();
        // ->add('monsters', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('name')
        ->addIdentifier('monsters')
        ->addIdentifier('equipments')
        ->addIdentifier('difficulty');
    }
}