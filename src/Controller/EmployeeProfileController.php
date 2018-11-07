<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmployeeProfileController extends Controller
{
    /**
     * @Route("/darbuotojas/profilis", name="darbuotojo_profilis")
     */
    public function index()
    {
        return $this->render('employee/profile.html.twig', [
            'controller_name' => 'EmployeeProfileController',
        ]);
    }
}