<?php

namespace App\Controller;

use App\Form\KlientoType;
use App\Entity\Klientas;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ClientRegistrationController extends AbstractController
{
    /**
     * @Route("/registruotis", name="klientu_registracija")
     */
    public function registruotis(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

    	// 1) build the form
        $user = new Klientas();
        $form = $this->createForm(KlientoType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getSlaptazodis());
            $user->setSlaptazodis($password);

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->AddFlash(
            	'info',
            	'Sėkmingai prisiregistravote'
            );

            return $this->redirectToRoute('klientu_registracija');
        }

        return $this->render(
        	'registration/index.html.twig',
            array('form' => $form->createView())
        );
    }
}