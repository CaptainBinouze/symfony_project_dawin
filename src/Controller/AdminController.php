<?php

// src/Controller/AdminController.php
namespace App\Controller;

use App\Form\PizzaType;
use App\Form\IngredientType;
use App\Entity\Pizza;
use App\Entity\Ingredient;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/pizza/add", name="add_pizza")
     */
    public function pizzaAction(Request $request)
    {
        // 1) build the form
        $pizza = new Pizza();

        //$ingredients = $this->getDoctrine()->getRepository(Ingredient::class)->findAll();

        $form = $this->createForm(PizzaType::class, $pizza);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) save the Pizza!
            $em = $this->getDoctrine()->getManager();
            $em->persist($pizza);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render(
            'pizza/add.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/ingredient/add", name="add_ingredient")
     */
    public function ingredientAction(Request $request)
    {
        // 1) build the form
        $ingredient = new Ingredient();

        $form = $this->createForm(IngredientType::class, $ingredient);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) save the ingredient
            $em = $this->getDoctrine()->getManager();
            $em->persist($ingredient);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render(
            'admin/ingredient.html.twig',
            array('form' => $form->createView())
        );
    }
}