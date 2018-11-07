<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmployeeScheduleController extends Controller
{
    /**
     * @Route("/darbuotojas/grafikas", name="darbuotojo_grafikas")
     */
    public function index()
    {
        return $this->render('employee/schedule.html.twig', [
            'controller_name' => 'EmployeeScheduleController',
        ]);
    }
}