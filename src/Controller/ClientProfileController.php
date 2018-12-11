<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use App\Entity\UserInfo;
use App\Entity\Klientas;
use App\Entity\Uzsakymas;
use App\Form\ChangeEmailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class ClientProfileController extends Controller
{

	private $encoder;

	public function __construct(UserPasswordEncoderInterface $encoder)
	{
		$this->encoder = $encoder;
	}


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


    /**
     * @Route("/ChangeNewsletter", name="ChangeNewsletter")
     */
    public function ChangeNewsletter(Request $request)
    {
    	$user = $this->getUser();
    	$em = $this -> getDoctrine() -> getManager();
    	$nl = $user->getNaujienlaiskiai();
    	if ($nl == 1)
    	{
    		$user->setNaujienlaiskiai(0);
    		$this->AddFlash(
            	'naujienlaiskiai',
            	'Atsisakėte naujienlaiškių'
            );
    	} else {
    		$user->setNaujienlaiskiai(1);
    		$this->AddFlash(
            	'naujienlaiskiai',
            	'Prenumeruojate naujienlaiškius'
            );
    	}
    	$em->persist($user);
    	$em->flush($user);
    	return $this->render('clientprofile/index.html.twig');
    }


    /**
     * @Route("/ChangeUsersPassword", name="ChangeUsersPassword")
     */
    public function ChangeUsersPass(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
		$user = $this->getUser();
		if ($user->getSlaptazodis() == $request->get('Senasslaptazodis'))
		{
    	$em = $this-> getDoctrine() -> getManager();

    	$pass = $request -> get('slaptazodis');
    	$password = $passwordEncoder->encodePassword($user, $pass);
    	$user->setSlaptazodis($password);

    	$em->persist($user);
		$em->flush($user);
		}

    	return $this->render('clientprofile/index.html.twig');
	}
	
	/**
	 * @Route("/ShowUsersOrders", name="ShowUsersOrders")
	 */
	public function ShowUsersOrders(Request $request)
	{
		$id = $this->getUser()->getId();

		$results = $this->getDoctrine()->getRepository(Uzsakymas::class)->getUsersOrders($id);

		return $this->render('clientprofile/index.html.twig',[
			'results' => $results,
		]);
	}

    /**
     * @Route("/ChangeUserData", name="ChangeUserData")
     */
    public function ChangeUserData(Request $request)
    {
    	$user = $this->getUser();

    	$em = $this -> getDoctrine() -> getManager();

   		$emailNew = $request -> get('el_pastas');
   		$nameNew = $request -> get('vardas');
   		$surnameNew = $request -> get('pavarde');
   		$phoneNew = $request -> get('telnr');
   		$adressNew = $request -> get('adresas');
   		$dateNew = $request -> get('data');
   		$em = $this -> getDoctrine() -> getManager();

   		$user->setElPastas($emailNew);
   		$user->setVardas($nameNew);
   		$user->setPavarde($surnameNew);
   		$user->setTelNr($phoneNew);
   		$user->setAdresas($adressNew);
   		$user->setGimimoData(\DateTime::createFromFormat('Y-m-d', $dateNew));

   		$em->persist($user);
   		$em->flush($user);

    	return $this->render('clientprofile/index.html.twig');
    }
}