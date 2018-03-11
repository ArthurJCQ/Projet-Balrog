<?php

namespace BalrogBundle\Form;

use BalrogBundle\Entity\Archer;
use BalrogBundle\Entity\Guerrier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class HeroType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('classe',ChoiceType::class,array(
                'choices' => array(
                    'Archer' => 'Archer',
                    'Guerrier' => 'Guerrier',
                    'Mage' => 'Mage',
                    'Voleur' => 'Voleur',
                ),
            ));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BalrogBundle\Entity\Hero'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'balrogbundle_hero';
    }


}
