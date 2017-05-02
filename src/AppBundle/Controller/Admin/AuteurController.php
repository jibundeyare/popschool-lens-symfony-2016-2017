<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Auteur;
use AppBundle\Form\AuteurDeleteType;
use AppBundle\Form\AuteurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Auteur controller.
 *
 * @Route("/admin/auteur")
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
        $auteurs = $this->getDoctrine()->getRepository(Auteur::class)->findAll();

        return $this->render('AppBundle:Auteur:index.html.twig', array(
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
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($auteur);
            $em->flush();

            return $this->redirectToRoute('auteur_show', array('id' => $auteur->getId()));
        }

        return $this->render('AppBundle:Auteur:new.html.twig', array(
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
        $deleteForm = $this->createForm(AuteurDeleteType::class, $auteur, [
            'action' => $this->generateUrl('auteur_delete', ['id' => $auteur->getId()])
        ]);

        return $this->render('AppBundle:Auteur:show.html.twig', array(
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
        $deleteForm = $this->createForm(AuteurDeleteType::class, $auteur, [
            'action' => $this->generateUrl('auteur_delete', ['id' => $auteur->getId()])
        ]);
        $editForm = $this->createForm(AuteurType::class, $auteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('auteur_edit', array('id' => $auteur->getId()));
        }

        return $this->render('AppBundle:Auteur:edit.html.twig', array(
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
        $form = $this->createForm(AuteurDeleteType::class, $auteur, [
            'action' => $this->generateUrl('auteur_delete', ['id' => $auteur->getId()])
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($auteur);
            $em->flush();
        }

        return $this->redirectToRoute('auteur_index');
    }
}
