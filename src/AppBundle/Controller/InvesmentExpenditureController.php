<?php

namespace AppBundle\Controller;

use AppBundle\Entity\InvesmentExpenditure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Invesmentexpenditure controller.
 *
 * @Route("invesmentexpenditure")
 */
class InvesmentExpenditureController extends Controller
{
    /**
     * Lists all invesmentExpenditure entities.
     *
     * @Route("/", name="invesmentexpenditure_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $invesmentExpenditures = $em->getRepository('AppBundle:InvesmentExpenditure')->findAll();

        return $this->render('invesmentexpenditure/index.html.twig', array(
            'invesmentExpenditures' => $invesmentExpenditures,
        ));
    }

    /**
     * Creates a new invesmentExpenditure entity.
     *
     * @Route("/new", name="invesmentexpenditure_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $invesmentExpenditure = new Invesmentexpenditure();
        $form = $this->createForm('AppBundle\Form\InvesmentExpenditureType', $invesmentExpenditure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invesmentExpenditure);
            $em->flush();

            return $this->redirectToRoute('invesmentexpenditure_show', array('id' => $invesmentExpenditure->getId()));
        }

        return $this->render('invesmentexpenditure/new.html.twig', array(
            'invesmentExpenditure' => $invesmentExpenditure,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a invesmentExpenditure entity.
     *
     * @Route("/{id}", name="invesmentexpenditure_show")
     * @Method("GET")
     */
    public function showAction(InvesmentExpenditure $invesmentExpenditure)
    {
        $deleteForm = $this->createDeleteForm($invesmentExpenditure);

        return $this->render('invesmentexpenditure/show.html.twig', array(
            'invesmentExpenditure' => $invesmentExpenditure,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing invesmentExpenditure entity.
     *
     * @Route("/{id}/edit", name="invesmentexpenditure_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, InvesmentExpenditure $invesmentExpenditure)
    {
        $deleteForm = $this->createDeleteForm($invesmentExpenditure);
        $editForm = $this->createForm('AppBundle\Form\InvesmentExpenditureType', $invesmentExpenditure);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('invesmentexpenditure_edit', array('id' => $invesmentExpenditure->getId()));
        }

        return $this->render('invesmentexpenditure/edit.html.twig', array(
            'invesmentExpenditure' => $invesmentExpenditure,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a invesmentExpenditure entity.
     *
     * @Route("/{id}", name="invesmentexpenditure_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, InvesmentExpenditure $invesmentExpenditure)
    {
        $form = $this->createDeleteForm($invesmentExpenditure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($invesmentExpenditure);
            $em->flush();
        }

        return $this->redirectToRoute('invesmentexpenditure_index');
    }

    /**
     * Creates a form to delete a invesmentExpenditure entity.
     *
     * @param InvesmentExpenditure $invesmentExpenditure The invesmentExpenditure entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(InvesmentExpenditure $invesmentExpenditure)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('invesmentexpenditure_delete', array('id' => $invesmentExpenditure->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
