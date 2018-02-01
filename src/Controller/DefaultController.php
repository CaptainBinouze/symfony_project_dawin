<?php

// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use App\Entity\Ingredient;
use App\Entity\Pizza;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="presentation")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/pizzas", name="pizzas_list")
     * @Template()
     */
    public function pizzasAction()
    {

        $pizzas = $this->getDoctrine()->getRepository(Pizza::class)->findAll();

        return ['pizzas'=> $pizzas];

    }


    /*public function insertPizzasAction() {
        $em = $this->get('doctrine')->getManager();

        $mozarella = new Ingredient;
        $mozarella->setName('Mozarella');
        $parmesan = new Ingredient;
        $parmesan->setName('Parmesan');
        $quatreFromages = new Pizza;
        $quatreFromages
            ->setName('4 fromages')
            ->setPrice(32.2)
            ->setDescription('Pour les fans de fromage')
            ;   
        $quatreFromages->addIngredient($mozarella);
        $quatreFromages->addIngredient($parmesan);
        $em->persist($quatreFromages);
        $em->persist($mozarella);
        $em->persist($parmesan);
        $em->flush();

        return new Response('Pizzas créées');
    }*/
}