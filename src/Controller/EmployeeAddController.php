<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmployeeAddController extends Controller
{
    /**
     * @Route("/darbuotojas/prideti", name="darbuotojas_prideti")
     */
    public function index()
    {
        return $this->render('employee/add.html.twig', [
            'controller_name' => 'EmployeeAddController',
        ]);
    }
}