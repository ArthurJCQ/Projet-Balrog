<?php

namespace BalrogBundle\Controller;

use BalrogBundle\Entity\Inventaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Inventaire controller.
 *
 * @Route("inventaire")
 */
class InventaireController extends Controller
{
    /**
     * Lists all inventaire entities.
     *
     * @Route("/", name="inventaire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $inventaires = $em->getRepository('BalrogBundle:Inventaire')->findAll();

        return $this->render('inventaire/index.html.twig', array(
            'inventaires' => $inventaires,
        ));
    }

    /**
     * Finds and displays a inventaire entity.
     *
     * @Route("/{id}", name="inventaire_show")
     * @Method("GET")
     */
    public function showAction(Inventaire $inventaire)
    {

        return $this->render('inventaire/show.html.twig', array(
            'inventaire' => $inventaire,
        ));
    }
}
