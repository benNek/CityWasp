<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarPageController extends Controller
{
    /**
     * @Route("/automobilis", name="automobilis")
     */
    public function index()
    {
        return $this->render('cars/car.html.twig', [
            'controller_name' => 'CarPageController',
        ]);
    }
}