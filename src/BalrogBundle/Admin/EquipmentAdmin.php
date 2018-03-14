<?php
namespace BalrogBundle\Admin;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Form\FormMapper;

class EquipmentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->with('Equipement', ['class' => 'col-md-9'])
            ->add('id', 'integer', array(
                'disabled' => true
            ))
            ->add('name', 'text')
            ->add('rareness', ChoiceType::class, array(
            'choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5
            ]))
        ->end()
        ->with('Level', ['class' => 'col-md-3'])
            ->add('level', ModelType::class, [
                            'required' => false,
                            'expanded' => true,
                            'multiple' => false,
                        ])
        ->end()
        ->with('Boosts', ['class' => 'col-md-12'])
            ->add('strength', 'integer')
            ->add('agility', 'integer')
            ->add('intelligence', 'integer')
            ->add('chance', 'integer')
        ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('name')
        ->addIdentifier('rareness')
        ->addIdentifier('level');
    }
}