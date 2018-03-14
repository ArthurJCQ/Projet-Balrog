<?php

namespace BalrogBundle\Controller;

use BalrogBundle\Entity\Monster;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Monster controller.
 *
 * @Route("monster")
 */
class MonsterController extends Controller
{
    /**
     * Lists all monster entities.
     *
     * @Route("/", name="monster_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $monsters = $em->getRepository('BalrogBundle:Monster')->findAll();

        return $this->render('monster/index.html.twig', array(
            'monsters' => $monsters,
        ));
    }

    /**
     * Finds and displays a monster entity.
     *
     * @Route("/{id}", name="monster_show")
     * @Method("GET")
     */
    public function showAction(Monster $monster)
    {

        return $this->render('monster/show.html.twig', array(
            'monster' => $monster,
        ));
    }
}
