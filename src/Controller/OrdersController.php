<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrdersController extends Controller
{
    /**
     * @Route("/uzsakymai", name="uzsakymai")
     */
    public function index()
    {
        return $this->render('orders/index.html.twig', [
            'controller_name' => 'OrdersController',
        ]);
    }
    /**
     * @Route("/naujasuzsakymas", name="naujasuzsakymas")
     */
    public function NewOrder()
    {
        return $this->render('orders/neworder.html.twig', [
            'controller_name' => 'OrdersController',
        ]);
    }
}