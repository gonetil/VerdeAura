<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CommonExpenses;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Commonexpense controller.
 *
 * @Route("commonexpenses")
 */
class CommonExpensesController extends Controller
{
    /**
     * Lists all commonExpense entities.
     *
     * @Route("/", name="commonexpenses_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commonExpenses = $em->getRepository('AppBundle:CommonExpenses')->findAll();

        return $this->render('commonexpenses/index.html.twig', array(
            'commonExpenses' => $commonExpenses,
        ));
    }

    /**
     * Creates a new commonExpense entity.
     *
     * @Route("/new", name="commonexpenses_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $commonExpense = new Commonexpense();
        $form = $this->createForm('AppBundle\Form\CommonExpensesType', $commonExpense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commonExpense);
            $em->flush();

            return $this->redirectToRoute('commonexpenses_show', array('id' => $commonExpense->getId()));
        }

        return $this->render('commonexpenses/new.html.twig', array(
            'commonExpense' => $commonExpense,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commonExpense entity.
     *
     * @Route("/{id}", name="commonexpenses_show")
     * @Method("GET")
     */
    public function showAction(CommonExpenses $commonExpense)
    {
        $deleteForm = $this->createDeleteForm($commonExpense);

        return $this->render('commonexpenses/show.html.twig', array(
            'commonExpense' => $commonExpense,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commonExpense entity.
     *
     * @Route("/{id}/edit", name="commonexpenses_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CommonExpenses $commonExpense)
    {
        $deleteForm = $this->createDeleteForm($commonExpense);
        $editForm = $this->createForm('AppBundle\Form\CommonExpensesType', $commonExpense);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commonexpenses_edit', array('id' => $commonExpense->getId()));
        }

        return $this->render('commonexpenses/edit.html.twig', array(
            'commonExpense' => $commonExpense,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commonExpense entity.
     *
     * @Route("/{id}", name="commonexpenses_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CommonExpenses $commonExpense)
    {
        $form = $this->createDeleteForm($commonExpense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commonExpense);
            $em->flush();
        }

        return $this->redirectToRoute('commonexpenses_index');
    }

    /**
     * Creates a form to delete a commonExpense entity.
     *
     * @param CommonExpenses $commonExpense The commonExpense entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CommonExpenses $commonExpense)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commonexpenses_delete', array('id' => $commonExpense->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
