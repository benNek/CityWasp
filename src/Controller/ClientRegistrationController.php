<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientRegistrationController extends Controller
{
    /**
     * @Route("/registruotis", name="klientu_registracija")
     */
    public function index()
    {
        return $this->render('registration/index.html.twig', [
            'controller_name' => 'ClientRegistrationController',
        ]);
    }
}