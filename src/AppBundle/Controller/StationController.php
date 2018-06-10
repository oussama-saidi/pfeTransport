<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Station;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Station controller.
 *
 * @Route("station")
 */
class StationController extends Controller
{
    /**
     * Lists all station entities.
     *
     * @Route("/", name="station_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stations = $em->getRepository('AppBundle:Station')->findAll();

        return $this->render('station/index.html.twig', array(
            'stations' => $stations,
        ));
    }

    /**
     * Creates a new station entity.
     *
     * @Route("/new", name="station_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $station = new Station();
        $form = $this->createForm('AppBundle\Form\StationType', $station);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($station);
            $em->flush();

            return $this->redirectToRoute('station_show', array('id' => $station->getId()));
        }

        return $this->render('station/new.html.twig', array(
            'station' => $station,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a station entity.
     *
     * @Route("/{id}", name="station_show")
     * @Method("GET")
     */
    public function showAction(Station $station)
    {
        $deleteForm = $this->createDeleteForm($station);

        return $this->render('station/show.html.twig', array(
            'station' => $station,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing station entity.
     *
     * @Route("/{id}/edit", name="station_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Station $station)
    {
        $deleteForm = $this->createDeleteForm($station);
        $editForm = $this->createForm('AppBundle\Form\StationType', $station);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('station_edit', array('id' => $station->getId()));
        }

        return $this->render('station/edit.html.twig', array(
            'station' => $station,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a station entity.
     *
     * @Route("/{id}", name="station_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Station $station)
    {
        $form = $this->createDeleteForm($station);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($station);
            $em->flush();
        }

        return $this->redirectToRoute('station_index');
    }

    /**
     * Creates a form to delete a station entity.
     *
     * @param Station $station The station entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Station $station)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('station_delete', array('id' => $station->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
