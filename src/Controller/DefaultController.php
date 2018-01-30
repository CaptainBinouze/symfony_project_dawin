<?php

// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return new Response(
            '<html><body>Hello world!</body></html>'
        );
    }
}