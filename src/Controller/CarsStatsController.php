<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarsStatsController extends Controller
{
    /**
     * @Route("/automobiliu-statistika", name="automobiliu-statistika")
     */
    public function index()
    {
        return $this->render('cars/stats.html.twig', [
            'controller_name' => 'CarsStatsController',
        ]);
    }
}