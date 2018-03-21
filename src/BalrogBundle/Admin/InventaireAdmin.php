<?php
namespace BalrogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Form\Type\BooleanType;
use Sonata\AdminBundle\Form\FormMapper;

class InventaireAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Inventaire', ['class' => 'col-md-12'])
                ->add('id', 'integer', array(
                    'disabled' => true
                ))
            ->end()
            ->with('Hero', ['class' => 'col-md-6'])
                ->add('hero', ModelType::class, [
                            'required' => true,
                            'expanded' => true,
                            'multiple' => false,
                            'btn_add' => false,
                        ])
            ->end()
            ->with('Equipement', ['class' => 'col-md-6'])
                ->add('equipment', ModelType::class, [
                            'required' => true,
                            'expanded' => true,
                            'multiple' => false,
                            'btn_add' => false,
                        ])
            ->end()
            ->with('Equipé', ['class' => 'col-md-12'])
                ->add('equiped', BooleanType::class)
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        ->add('id')
        ->add('hero')
        ->add('equipment')
        ->add('equiped');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('id')
        ->addIdentifier('hero')
        ->addIdentifier('equipment')
        ->addIdentifier('equiped');
    }

    /**
     * [preUpdate description]
     * @param  [type] $inventaire [description]
     * @return [type]             [description]
     */
    public function prePersist($inventaire)
    {
        //dump($inventaire);die();
        $inventaire->getHero()->addInventory($inventaire);
    }

    public function preUpdate($inventaire)
    {
        $inventaire->getHero()->addInventory($inventaire);
    }

    public function preRemove($inventaire)
    {
        $inventaire->getHero()->removeInventory($inventaire);
    }
}