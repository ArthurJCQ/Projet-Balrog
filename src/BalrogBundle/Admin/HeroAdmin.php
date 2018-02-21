<?php
namespace BalrogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class HeroAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->with('Héro', ['class' => 'col-md-8'])
            ->add('name', 'text')
            ->add('classe', ChoiceType::class, array(
                'choices'  => [
                    'Guerrier' => 'Guerrier',
                    'Voleur' => 'Voleur',
                    'Archer' => 'Archer',
                    'Mage' => 'Mage'
                ]))
        ->end()
        ->with('Joueur', ['class' => 'col-md-4'])
            ->add('user', 'sonata_type_model_list', array())
        ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('id')
        ->addIdentifier('name')
        ->addIdentifier('classe')
        ->addIdentifier('level')
        ->addIdentifier('user');
    }

}