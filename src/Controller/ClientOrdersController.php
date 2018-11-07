<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientOrdersController extends Controller
{
    /**
     * @Route("/kuzsakymai", name="kliento_uzsakymai")
     */
    public function index()
    {
        return $this->render('clientorders/index.html.twig', [
            'controller_name' => 'ClientOrdersController',
        ]);
    }
}