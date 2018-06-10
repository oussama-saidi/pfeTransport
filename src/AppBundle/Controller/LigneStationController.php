<?php

namespace AppBundle\Controller;

use AppBundle\Entity\LigneStation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lignestation controller.
 *
 * @Route("lignestation")
 */
class LigneStationController extends Controller
{
    /**
     * Lists all ligneStation entities.
     *
     * @Route("/", name="lignestation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ligneStations = $em->getRepository('AppBundle:LigneStation')->findAll();

        return $this->render('lignestation/index.html.twig', array(
            'ligneStations' => $ligneStations,
        ));
    }

    /**
     * Creates a new ligneStation entity.
     *
     * @Route("/new", name="lignestation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ligneStation = new Lignestation();
        $form = $this->createForm('AppBundle\Form\LigneStationType', $ligneStation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ligneStation);
            $em->flush();

            return $this->redirectToRoute('lignestation_show', array('id' => $ligneStation->getId()));
        }

        return $this->render('lignestation/new.html.twig', array(
            'ligneStation' => $ligneStation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ligneStation entity.
     *
     * @Route("/{id}", name="lignestation_show")
     * @Method("GET")
     */
    public function showAction(LigneStation $ligneStation)
    {
        $deleteForm = $this->createDeleteForm($ligneStation);

        return $this->render('lignestation/show.html.twig', array(
            'ligneStation' => $ligneStation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ligneStation entity.
     *
     * @Route("/{id}/edit", name="lignestation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LigneStation $ligneStation)
    {
        $deleteForm = $this->createDeleteForm($ligneStation);
        $editForm = $this->createForm('AppBundle\Form\LigneStationType', $ligneStation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lignestation_edit', array('id' => $ligneStation->getId()));
        }

        return $this->render('lignestation/edit.html.twig', array(
            'ligneStation' => $ligneStation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ligneStation entity.
     *
     * @Route("/{id}", name="lignestation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LigneStation $ligneStation)
    {
        $form = $this->createDeleteForm($ligneStation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ligneStation);
            $em->flush();
        }

        return $this->redirectToRoute('lignestation_index');
    }

    /**
     * Creates a form to delete a ligneStation entity.
     *
     * @param LigneStation $ligneStation The ligneStation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LigneStation $ligneStation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lignestation_delete', array('id' => $ligneStation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
