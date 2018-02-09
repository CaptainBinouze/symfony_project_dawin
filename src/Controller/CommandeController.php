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
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

            $commande->setUser($user);
            $commande->setStatut(0);
            $em->persist($commande);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render(
            'commande/index.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/waiting", name="waiting_commande")
     */
    public function commandeWaitingAction(Request $request)
    {
 
        $commande = $this->getDoctrine()->getRepository(Commande::class)->findBy(
            array('statut' => '0'),         // Critere
            array('created' => 'desc'),     // Tri
            100,                            // Limite
            0                               // Offset
          );

        return $this->render('commande/waiting.html.twig',
            array('commandes' => $commande)
        );

    }
}