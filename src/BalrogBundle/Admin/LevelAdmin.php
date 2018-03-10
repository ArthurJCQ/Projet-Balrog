<?php
namespace BalrogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use BalrogBundle\Entity\Level;

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
                            'btn_add' => false,
                        ])
        ->end()
        ->with('Equipements', ['class' => 'col-md-6'])
            ->add('equipments', ModelType::class, [
                            'required' => false,
                            'expanded' => true,
                            'multiple' => true,
                            'btn_add' => false,
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


    /**
     * [preUpdate -- Lors de la MàJ d'un Level; force l'actualisation de ses monstres / équipements]
     * @param  [Level] $level [L'objet Level qui est en train d'être modifié]
     * @author ArthurJCQ
     */
    public function preUpdate($level)
    {
        //dump($level->getEquipments());die();
        
        $repoMonster = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository('BalrogBundle:Monster');
        $repoEquip = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository('BalrogBundle:Equipment');

        $monsterList = $repoMonster->findAll();
        $equipList = $repoEquip->findAll();

        foreach ($monsterList as $monster) {
            if($level->getMonsters()->contains($monster)){
                $monster->setLevel($level);
            }elseif (null !== $monster->getLevel() && ($monster->getLevel()->getId() == $level->getId())) {
                    $monster->setLevel(null);
            }
        }

        foreach ($equipList as $equip) {
            if($level->getEquipments()->contains($equip)){
                $equip->setLevel($level);
            }elseif (null !== $equip->getLevel() && ($equip->getLevel()->getId() == $level->getId())) {
                    $equip->setLevel(null);
            }
        }
    }
}