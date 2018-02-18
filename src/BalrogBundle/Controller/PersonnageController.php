<?php

namespace BalrogBundle\Controller;

use BalrogBundle\Entity\Personnage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Personnage controller.
 *
 * @Route("personnage")
 */
class PersonnageController extends Controller
{
    /**
     * Lists all personnage entities.
     *
     * @Route("/", name="personnage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $personnages = $em->getRepository('BalrogBundle:Personnage')->findAll();

        return $this->render('personnage/index.html.twig', array(
            'personnages' => $personnages,
        ));
    }

    /**
     * Creates a new personnage entity.
     *
     * @Route("/new", name="personnage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $personnage = new Personnage();
        $form = $this->createForm('BalrogBundle\Form\PersonnageType', $personnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personnage);
            $em->flush();

            return $this->redirectToRoute('personnage_show', array('id' => $personnage->getId()));
        }

        return $this->render('personnage/new.html.twig', array(
            'personnage' => $personnage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a personnage entity.
     *
     * @Route("/{id}", name="personnage_show")
     * @Method("GET")
     */
    public function showAction(Personnage $personnage)
    {
        $deleteForm = $this->createDeleteForm($personnage);

        return $this->render('personnage/show.html.twig', array(
            'personnage' => $personnage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing personnage entity.
     *
     * @Route("/{id}/edit", name="personnage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Personnage $personnage)
    {
        $deleteForm = $this->createDeleteForm($personnage);
        $editForm = $this->createForm('BalrogBundle\Form\PersonnageType', $personnage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personnage_edit', array('id' => $personnage->getId()));
        }

        return $this->render('personnage/edit.html.twig', array(
            'personnage' => $personnage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a personnage entity.
     *
     * @Route("/{id}", name="personnage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Personnage $personnage)
    {
        $form = $this->createDeleteForm($personnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($personnage);
            $em->flush();
        }

        return $this->redirectToRoute('personnage_index');
    }

    /**
     * Creates a form to delete a personnage entity.
     *
     * @param Personnage $personnage The personnage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Personnage $personnage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personnage_delete', array('id' => $personnage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
