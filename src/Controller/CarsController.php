<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarsController extends Controller
{
    /**
     * @Route("/automobiliai", name="automobiliai")
     */
    public function index()
    {
        return $this->render('cars/index.html.twig', [
            'controller_name' => 'CarsController',
        ]);
    }
}