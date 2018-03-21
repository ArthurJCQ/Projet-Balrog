<?php

namespace BalrogBundle\Form\EventListener;


use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class AddCat implements EventSubscriberInterface
{

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2')))
     *
     * @return array The event names to listen to
     */

    public static function getSubscribedEvents(){

        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    public function preSetData(FormEvent $event){
        $product = $event->getData();
        $form = $event->getForm();

        if(!$product || null === $product->getId()){
            $form->add('classe',ChoiceType::class,array(
                'choices' => array(
                    'Archer' => 'Archer',
                    'Guerrier' => 'Guerrier',
                    'Mage' => 'Mage',
                    'Voleur' => 'Voleur',
                ),
            ));
        }
    }

}