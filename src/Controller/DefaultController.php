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
}