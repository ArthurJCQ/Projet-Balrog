<?php

namespace BalrogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction()
    {
        return $this->render('accueil/index.html.twig');
    }

    /**
     * @Route("/personnage", name="personnage")
     */
    public function personnageAction()
    {
        return $this->render('accueil/classes.html.twig');
    }
}
