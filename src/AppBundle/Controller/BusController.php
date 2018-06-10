<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bus controller.
 *
 * @Route("bus")
 */
class BusController extends Controller
{
    /**
     * Lists all bus entities.
     *
     * @Route("/", name="bus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $buses = $em->getRepository('AppBundle:Bus')->findAll();

        return $this->render('bus/index.html.twig', array(
            'buses' => $buses,
        ));
    }

    /**
     * Creates a new bus entity.
     *
     * @Route("/new", name="bus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bus = new Bus();
        $form = $this->createForm('AppBundle\Form\BusType', $bus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bus);
            $em->flush();

            return $this->redirectToRoute('bus_show', array('id' => $bus->getId()));
        }

        return $this->render('bus/new.html.twig', array(
            'bus' => $bus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bus entity.
     *
     * @Route("/{id}", name="bus_show")
     * @Method("GET")
     */
    public function showAction(Bus $bus)
    {
        $deleteForm = $this->createDeleteForm($bus);

        $em = $this->getDoctrine()->getManager();
        $conducteur = $em->getRepository('AppBundle:Conducteur')->findBy(array(
            'id'=>$bus->getConducteur()
        ));
        return $this->render('bus/show.html.twig', array(
            'bus' => $bus,
            'conducteur' =>$conducteur[0]->getPrenomNom() ,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bus entity.
     *
     * @Route("/{id}/edit", name="bus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bus $bus)
    {
        $deleteForm = $this->createDeleteForm($bus);
        $editForm = $this->createForm('AppBundle\Form\BusType', $bus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bus_edit', array('id' => $bus->getId()));
        }

        return $this->render('bus/edit.html.twig', array(
            'bus' => $bus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bus entity.
     *
     * @Route("/{id}", name="bus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bus $bus)
    {
        $form = $this->createDeleteForm($bus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bus);
            $em->flush();
        }

        return $this->redirectToRoute('bus_index');
    }

    /**
     * Creates a form to delete a bus entity.
     *
     * @param Bus $bus The bus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bus $bus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bus_delete', array('id' => $bus->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
