<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ligne;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ligne controller.
 *
 * @Route("ligne")
 */
class LigneController extends Controller
{
    /**
     * Lists all ligne entities.
     *
     * @Route("/", name="ligne_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lignes = $em->getRepository('AppBundle:Ligne')->findAll();

        return $this->render('ligne/index.html.twig', array(
            'lignes' => $lignes,
        ));
    }

    /**
     * Creates a new ligne entity.
     *
     * @Route("/new", name="ligne_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ligne = new Ligne();
        $form = $this->createForm('AppBundle\Form\LigneType', $ligne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ligne);
            $em->flush();

            return $this->redirectToRoute('ligne_show', array('id' => $ligne->getId()));
        }

        return $this->render('ligne/new.html.twig', array(
            'ligne' => $ligne,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ligne entity.
     *
     * @Route("/{id}", name="ligne_show")
     * @Method("GET")
     */
    public function showAction(Ligne $ligne)
    {
        $deleteForm = $this->createDeleteForm($ligne);

        return $this->render('ligne/show.html.twig', array(
            'ligne' => $ligne,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ligne entity.
     *
     * @Route("/{id}/edit", name="ligne_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ligne $ligne)
    {
        $deleteForm = $this->createDeleteForm($ligne);
        $editForm = $this->createForm('AppBundle\Form\LigneType', $ligne);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligne_edit', array('id' => $ligne->getId()));
        }

        return $this->render('ligne/edit.html.twig', array(
            'ligne' => $ligne,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ligne entity.
     *
     * @Route("/{id}", name="ligne_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ligne $ligne)
    {
        $form = $this->createDeleteForm($ligne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ligne);
            $em->flush();
        }

        return $this->redirectToRoute('ligne_index');
    }

    /**
     * Creates a form to delete a ligne entity.
     *
     * @param Ligne $ligne The ligne entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ligne $ligne)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ligne_delete', array('id' => $ligne->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
