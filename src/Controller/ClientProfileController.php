<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use App\Entity\UserInfo;
use App\Entity\Klientas;
use Symfony\Component\HttpFoundation\Request;


class ClientProfileController extends Controller
{
    /**
     * @Route("/kprofilis", name="klientu_profilis")
     */
    public function index()
    {
    	//$this->denyAccessUnlessGranted('ROLE_USER');

    	//$name->$utils->getLastUsername()->getVardas();
    	$user=$this->getUser();
    	$this->AddFlash(
            	'kprisijunges',
            	'Sveiki prisijungę, '
            );
        return $this->render('clientprofile/index.html.twig', [
            'controller_name' => 'ClientProfileController',
        ]);
    }
}