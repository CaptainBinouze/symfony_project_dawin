<?php

// src/Controller/AdminController.php
namespace App\Controller;

use App\Form\PizzaType;
use App\Entity\Pizza;
use App\Entity\Ingredient;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/admin/")
 */
class AdminController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("pizza/add", name="add_pizza")
     */
    public function pizzaAction(Request $request)
    {
        // 1) build the form
        $pizza = new Pizza();

        //$pizza->addIngredient($this->getDoctrine()->getRepository(Ingredient::class)->findAll());
        
        $form = $this->createForm(PizzaType::class, $pizza);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) save the Pizza!
            $em = $this->getDoctrine()->getManager();
            $em->persist($pizza);
            $em->flush();

            return $this->redirectToRoute('presentation');
        }

        return $this->render(
            'pizza/add.html.twig',
            array('form' => $form->createView())
        );
    }
}