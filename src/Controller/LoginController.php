<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Klientas;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $utils)
    {
        $error = $utils->getLastAuthenticationError();
        $lastUsername = $utils->getLastUsername();
        return $this->render('/login/index.html.twig', [
            'error'         => $error,
            'last_username'     => $lastUsername
        ]);
    }

    /**
     * @Route("/delete_user", name="delete_user")
     */
    public function delete_Klientas(Request $request)
    {
        $arPakeite = 0;
        if ($this->getUser()->getSlaptazodis() == $request->get('slaptazodis'))
        {
        $currentUserId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $usrRepo = $em->getRepository(Klientas::class);
        $user = $usrRepo->find($currentUserId);
        $session = $this->get('session');
        $session = new Session();
        $session->invalidate();
        $em->remove($user);
        $em->flush();
        $arPakeite = 1;
        }

        if (arPakeite == 1)
        {
            $user->setNaujienlaiskiai(1);
    		$this->AddFlash(
            	'slaptazodis',
            	'Pakeitėte slaptažodį'
            );
        } else {
            $user->setNaujienlaiskiai(1);
    		$this->AddFlash(
            	'slaptazodis',
            	'Slaptažodžio pakeisti nepavyko'
            );
        }

      return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }
}