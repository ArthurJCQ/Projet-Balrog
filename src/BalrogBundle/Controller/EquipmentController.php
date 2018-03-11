<?php

namespace BalrogBundle\Controller;

use BalrogBundle\Entity\Equipment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Equipment controller.
 *
 * @Route("equipment")
 */
class EquipmentController extends Controller
{
    /**
     * Lists all equipment entities.
     *
     * @Route("/", name="equipment_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipment = $em->getRepository('BalrogBundle:Equipment')->findAll();

        return $this->render('equipment/index.html.twig', array(
            'equipment' => $equipment,
        ));
    }

    /**
     * Finds and displays a equipment entity.
     *
     * @Route("/{id}", name="equipment_show")
     * @Method("GET")
     */
    public function showAction(Equipment $equipment)
    {

        return $this->render('equipment/show.html.twig', array(
            'equipment' => $equipment,
        ));
    }
}
