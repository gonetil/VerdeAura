<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Chef;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Chef controller.
 *
 * @Route("chef")
 */
class ChefController extends Controller
{
    /**
     * Lists all chef entities.
     *
     * @Route("/", name="chef_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $chefs = $em->getRepository('AppBundle:Chef')->findAll();

        return $this->render('chef/index.html.twig', array(
            'chefs' => $chefs,
        ));
    }

    /**
     * Creates a new chef entity.
     *
     * @Route("/new", name="chef_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $chef = new Chef();
        $form = $this->createForm('AppBundle\Form\ChefType', $chef);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chef);
            $em->flush();

            return $this->redirectToRoute('chef_show', array('id' => $chef->getId()));
        }

        return $this->render('chef/new.html.twig', array(
            'chef' => $chef,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a chef entity.
     *
     * @Route("/{id}", name="chef_show")
     * @Method("GET")
     */
    public function showAction(Chef $chef)
    {
        $deleteForm = $this->createDeleteForm($chef);

        return $this->render('chef/show.html.twig', array(
            'chef' => $chef,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing chef entity.
     *
     * @Route("/{id}/edit", name="chef_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Chef $chef)
    {
        $deleteForm = $this->createDeleteForm($chef);
        $editForm = $this->createForm('AppBundle\Form\ChefType', $chef);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chef_edit', array('id' => $chef->getId()));
        }

        return $this->render('chef/edit.html.twig', array(
            'chef' => $chef,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a chef entity.
     *
     * @Route("/{id}", name="chef_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Chef $chef)
    {
        $form = $this->createDeleteForm($chef);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chef);
            $em->flush();
        }

        return $this->redirectToRoute('chef_index');
    }

    /**
     * Creates a form to delete a chef entity.
     *
     * @param Chef $chef The chef entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Chef $chef)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('chef_delete', array('id' => $chef->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
