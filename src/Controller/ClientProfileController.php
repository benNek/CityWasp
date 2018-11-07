<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientProfileController extends Controller
{
    /**
     * @Route("/kprofilis", name="klientu_profilis")
     */
    public function index()
    {
        return $this->render('clientprofile/index.html.twig', [
            'controller_name' => 'ClientProfileController',
        ]);
    }
}