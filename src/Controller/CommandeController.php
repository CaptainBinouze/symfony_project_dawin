<?php

// src/Controller/CommandeController.php
namespace App\Controller;

use App\Form\CommandeType;
use App\Entity\Commande;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/commande")
 */
class CommandeController extends Controller
{
    /**
     * @Route("/", name="commande")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/new", name="new_commande")
     */
    public function commandeAction(Request $request)
    {
        $commande = new Commande();

        $form = $this->createForm(CommandeType::class, $commande);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render(
            'commande/index.html.twig',
            array('form' => $form->createView())
        );
    }
}