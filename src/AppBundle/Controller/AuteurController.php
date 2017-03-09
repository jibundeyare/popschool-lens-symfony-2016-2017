<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Auteur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Auteur controller.
 *
 * @Route("auteur")
 */
class AuteurController extends Controller
{
    /**
     * Lists all auteur entities.
     *
     * @Route("/", name="auteur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $auteurs = $em->getRepository('AppBundle:Auteur')->findAll();

        return $this->render('AppBundle::auteur/index.html.twig', array(
            'auteurs' => $auteurs,
        ));
    }

    /**
     * Creates a new auteur entity.
     *
     * @Route("/new", name="auteur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $auteur = new Auteur();
        $form = $this->createForm('AppBundle\Form\AuteurType', $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($auteur);
            $em->flush($auteur);

            return $this->redirectToRoute('auteur_show', array('id' => $auteur->getId()));
        }

        return $this->render('AppBundle::auteur/new.html.twig', array(
            'auteur' => $auteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a auteur entity.
     *
     * @Route("/{id}", name="auteur_show")
     * @Method("GET")
     */
    public function showAction(Auteur $auteur)
    {
        $deleteForm = $this->createDeleteForm($auteur);

        return $this->render('AppBundle::auteur/show.html.twig', array(
            'auteur' => $auteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing auteur entity.
     *
     * @Route("/{id}/edit", name="auteur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Auteur $auteur)
    {
        $deleteForm = $this->createDeleteForm($auteur);
        $editForm = $this->createForm('AppBundle\Form\AuteurType', $auteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('auteur_edit', array('id' => $auteur->getId()));
        }

        return $this->render('AppBundle::auteur/edit.html.twig', array(
            'auteur' => $auteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a auteur entity.
     *
     * @Route("/{id}", name="auteur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Auteur $auteur)
    {
        $form = $this->createDeleteForm($auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($auteur);
            $em->flush($auteur);
        }

        return $this->redirectToRoute('auteur_index');
    }

    /**
     * Creates a form to delete a auteur entity.
     *
     * @param Auteur $auteur The auteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Auteur $auteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('auteur_delete', array('id' => $auteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
