<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Conducteur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Conducteur controller.
 *
 * @Route("conducteur")
 */
class ConducteurController extends Controller
{
    /**
     * Lists all conducteur entities.
     *
     * @Route("/", name="conducteur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $conducteurs = $em->getRepository('AppBundle:Conducteur')->findAll();

        return $this->render('conducteur/index.html.twig', array(
            'conducteurs' => $conducteurs,
        ));
    }

    /**
     * Creates a new conducteur entity.
     *
     * @Route("/new", name="conducteur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $conducteur = new Conducteur();
        $form = $this->createForm('AppBundle\Form\ConducteurType', $conducteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($conducteur);
            $em->flush();

            return $this->redirectToRoute('conducteur_show', array('id' => $conducteur->getId()));
        }

        return $this->render('conducteur/new.html.twig', array(
            'conducteur' => $conducteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a conducteur entity.
     *
     * @Route("/{id}", name="conducteur_show")
     * @Method("GET")
     */
    public function showAction(Conducteur $conducteur)
    {
        $deleteForm = $this->createDeleteForm($conducteur);

        return $this->render('conducteur/show.html.twig', array(
            'conducteur' => $conducteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing conducteur entity.
     *
     * @Route("/{id}/edit", name="conducteur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Conducteur $conducteur)
    {
        $deleteForm = $this->createDeleteForm($conducteur);
        $editForm = $this->createForm('AppBundle\Form\ConducteurType', $conducteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('conducteur_edit', array('id' => $conducteur->getId()));
        }

        return $this->render('conducteur/edit.html.twig', array(
            'conducteur' => $conducteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a conducteur entity.
     *
     * @Route("/{id}", name="conducteur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Conducteur $conducteur)
    {
        $form = $this->createDeleteForm($conducteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($conducteur);
            $em->flush();
        }

        return $this->redirectToRoute('conducteur_index');
    }

    /**
     * Creates a form to delete a conducteur entity.
     *
     * @param Conducteur $conducteur The conducteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Conducteur $conducteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('conducteur_delete', array('id' => $conducteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
