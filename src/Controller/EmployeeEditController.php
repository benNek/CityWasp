<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmployeeEditController extends Controller
{
    /**
     * @Route("/darbuotojas/redaguoti", name="darbuotojas_redaguoti")
     */
    public function index()
    {
        
        return $this->render('employee/edit.html.twig', [
            'controller_name' => 'EmployeeEditController',
        ]);
    }
}