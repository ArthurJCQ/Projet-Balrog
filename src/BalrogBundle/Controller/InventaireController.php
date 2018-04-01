<?php

namespace BalrogBundle\Controller;

use BalrogBundle\Entity\Equipment;
use BalrogBundle\Entity\Hero;
use BalrogBundle\Entity\Inventaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Inventaire controller.
 *
 * @Route("inventaire")
 */
class InventaireController extends Controller
{
   /* /**
     * Lists all inventaire entities.
     *
     * @Route("/", name="inventaire_index")
     * @Method("GET")
     */
   /* public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $inventaires = $em->getRepository('BalrogBundle:Inventaire')->findAll();

        return $this->render('inventaire/index.html.twig', array(
            'inventaires' => $inventaires
        ));
    }*/

    /**
     * Lists all inventaire entities for one hero.
     *
     * @Route("/{id}", name="inventaire_index")
     * @Method("GET")
     */
    public function indexAction(Hero $hero)
    {
        $em = $this->getDoctrine()->getManager();

        $inventaires = $em->getRepository('BalrogBundle:Inventaire')->findAll();

        return $this->render('inventaire/index.html.twig', array(
            'inventaires' => $inventaires,
            'hero' => $hero
        ));
    }

    /**
     * Creates a new inventaire entity.
     *
     * @Route("/new", name="inventaire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $inventaire = new Inventaire();
        $form = $this->createForm('BalrogBundle\Form\InventaireType', $inventaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($inventaire);
            $em->flush();

            return $this->redirectToRoute('inventaire_show', array('id' => $inventaire->getId()));
        }

        return $this->render('inventaire/new.html.twig', array(
            'inventaire' => $inventaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a inventaire entity.
     *
     * @Route("/show/{id}", name="inventaire_show")
     * @Method("GET")
     */
    public function showAction(Inventaire $inventaire)
    {
        $deleteForm = $this->createDeleteForm($inventaire);

        return $this->render('inventaire/show.html.twig', array(
            'inventaire' => $inventaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing inventaire entity.
     *
     * @Route("/{id}/edit", name="inventaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Inventaire $inventaire)
    {
        $deleteForm = $this->createDeleteForm($inventaire);
        $editForm = $this->createForm('BalrogBundle\Form\InventaireType', $inventaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('inventaire_edit', array('id' => $inventaire->getId()));
        }

        return $this->render('inventaire/edit.html.twig', array(
            'inventaire' => $inventaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a inventaire entity.
     *
     * @Route("/{id}", name="inventaire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Inventaire $inventaire)
    {
        $form = $this->createDeleteForm($inventaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($inventaire);
            $em->flush();
        }

        return $this->redirectToRoute('inventaire_index');
    }

    /**
     * Creates a form to delete a inventaire entity.
     *
     * @param Inventaire $inventaire The inventaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Inventaire $inventaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('inventaire_delete', array('id' => $inventaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
