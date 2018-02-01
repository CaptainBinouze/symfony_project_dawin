<?php

// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
        return [
            'pizzas' => [
                '4 fromages', 'Reine', 'Paysanne'
            ]
        ];
    }
}