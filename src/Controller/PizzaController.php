<?php

// src/App/Controller/PizzaController.php
namespace App\Controller;

use App\Form\PizzaType;
use App\Entity\Pizza;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends Controller
{
    /**
     * @Route("/addpizza", name="add_pizza")
     */
    public function pizzaAction(Request $request)
    {
        // 1) build the form
        $pizza = new Pizza();
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