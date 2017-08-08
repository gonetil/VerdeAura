<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CapitalInvestment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Capitalinvestment controller.
 *
 * @Route("capitalinvestment")
 */
class CapitalInvestmentController extends Controller
{
    /**
     * Lists all capitalInvestment entities.
     *
     * @Route("/", name="capitalinvestment_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $capitalInvestments = $em->getRepository('AppBundle:CapitalInvestment')->findAll();

        return $this->render('capitalinvestment/index.html.twig', array(
            'capitalInvestments' => $capitalInvestments,
        ));
    }

    /**
     * Creates a new capitalInvestment entity.
     *
     * @Route("/new", name="capitalinvestment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $capitalInvestment = new Capitalinvestment();
        $form = $this->createForm('AppBundle\Form\CapitalInvestmentType', $capitalInvestment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($capitalInvestment);
            $em->flush();

            return $this->redirectToRoute('capitalinvestment_show', array('id' => $capitalInvestment->getId()));
        }

        return $this->render('capitalinvestment/new.html.twig', array(
            'capitalInvestment' => $capitalInvestment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a capitalInvestment entity.
     *
     * @Route("/{id}", name="capitalinvestment_show")
     * @Method("GET")
     */
    public function showAction(CapitalInvestment $capitalInvestment)
    {
        $deleteForm = $this->createDeleteForm($capitalInvestment);

        return $this->render('capitalinvestment/show.html.twig', array(
            'capitalInvestment' => $capitalInvestment,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing capitalInvestment entity.
     *
     * @Route("/{id}/edit", name="capitalinvestment_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CapitalInvestment $capitalInvestment)
    {
        $deleteForm = $this->createDeleteForm($capitalInvestment);
        $editForm = $this->createForm('AppBundle\Form\CapitalInvestmentType', $capitalInvestment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('capitalinvestment_edit', array('id' => $capitalInvestment->getId()));
        }

        return $this->render('capitalinvestment/edit.html.twig', array(
            'capitalInvestment' => $capitalInvestment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a capitalInvestment entity.
     *
     * @Route("/{id}", name="capitalinvestment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CapitalInvestment $capitalInvestment)
    {
        $form = $this->createDeleteForm($capitalInvestment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($capitalInvestment);
            $em->flush();
        }

        return $this->redirectToRoute('capitalinvestment_index');
    }

    /**
     * Creates a form to delete a capitalInvestment entity.
     *
     * @param CapitalInvestment $capitalInvestment The capitalInvestment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CapitalInvestment $capitalInvestment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('capitalinvestment_delete', array('id' => $capitalInvestment->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
