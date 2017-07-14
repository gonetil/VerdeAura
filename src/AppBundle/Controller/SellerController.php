<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Seller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Seller controller.
 *
 * @Route("seller")
 */
class SellerController extends Controller
{
    /**
     * Lists all seller entities.
     *
     * @Route("/", name="seller_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sellers = $em->getRepository('AppBundle:Seller')->findAll();

        return $this->render('seller/index.html.twig', array(
            'sellers' => $sellers,
        ));
    }

    /**
     * Creates a new seller entity.
     *
     * @Route("/new", name="seller_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $seller = new Seller();
        $form = $this->createForm('AppBundle\Form\SellerType', $seller);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seller);
            $em->flush();

            return $this->redirectToRoute('seller_show', array('id' => $seller->getId()));
        }

        return $this->render('seller/new.html.twig', array(
            'seller' => $seller,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a seller entity.
     *
     * @Route("/{id}", name="seller_show")
     * @Method("GET")
     */
    public function showAction(Seller $seller)
    {
        $deleteForm = $this->createDeleteForm($seller);

        return $this->render('seller/show.html.twig', array(
            'seller' => $seller,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing seller entity.
     *
     * @Route("/{id}/edit", name="seller_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Seller $seller)
    {
        $deleteForm = $this->createDeleteForm($seller);
        $editForm = $this->createForm('AppBundle\Form\SellerType', $seller);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('seller_edit', array('id' => $seller->getId()));
        }

        return $this->render('seller/edit.html.twig', array(
            'seller' => $seller,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a seller entity.
     *
     * @Route("/{id}", name="seller_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Seller $seller)
    {
        $form = $this->createDeleteForm($seller);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($seller);
            $em->flush();
        }

        return $this->redirectToRoute('seller_index');
    }

    /**
     * Creates a form to delete a seller entity.
     *
     * @param Seller $seller The seller entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Seller $seller)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('seller_delete', array('id' => $seller->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
