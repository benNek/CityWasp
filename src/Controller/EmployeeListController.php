<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Time;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use App\Entity\Darbuotojas;

class EmployeeListController extends Controller
{
    /**
     * @Route("/darbuotojai", name="darbuotojai")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Darbuotojas::class);
        $users = $repository->findAll();
        $naudotojas = $this->getUser()->getRole();
        return $this->render('employee/list.html.twig', [
            'users' => $users,
            'naudotojas' => $naudotojas,
            'tikrinti' => false,
            'tikrintialga' => false
        ]);
    }
        /**
     * @Route("/checkIfWorking", name="checkIfWorking")
     */
    public function CheckIfWorking(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Darbuotojas::class);
        $users = $repository->findAll();
        $naudotojas = $this->getUser()->getRole();

        $currentTime = date("H:i:s");
        $darboPradzia = $request->get("dataNuo");
        $darboPabaiga = $request->get("dataIki");
        if($currentTime < $darboPabaiga && $currentTime > $darboPradzia)
        {
            return $this->render('employee/list.html.twig', [
                'users' => $users,
                'naudotojas' => $naudotojas,
                'dirba' => true,
                'tikrinti' => true
            ]); 
        }       
        return $this->render('employee/list.html.twig', [
            'users' => $users,
            'naudotojas' => $naudotojas,
            'dirba' => false,
            'tikrinti' => true
        ]);
    }
        /**
     * @Route("/alga", name="countAlga")
     */
    public function countAlga(Request $request)
    {
        $koficientas = 3;
        $repository = $this->getDoctrine()->getRepository(Darbuotojas::class);
        $users = $repository->findAll();
        $naudotojas = $this->getUser()->getRole();
        $pradzia = $request->get("dataNuo");
        $pabaiga = $request->get("dataIki");
        $skirtumas = (int)$pabaiga - (int)$pradzia;
        $skirtumas = $skirtumas * $koficientas;
        return $this->render('employee/list.html.twig', [
            'users' => $users,
            'naudotojas' => $naudotojas,
            'alga' => $skirtumas,
            'tikrintialga' => true,
            'tikrinti' => false
        ]);
    }
    /**
     * @Route("/darbuotojas/darbredagavimas/{id}", name="darbredagavimas")
     */
    public function redaguoti(Darbuotojas $user)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(Darbuotojas::class)->find($user);
        return $this->render('employee/profile.html.twig', [
            'user' => $user,
        ]);
    }
    /**
     * @Route("/darbuotojas/atnaujinti/{id}", name="atnaujinti")
     */
    public function atnaujinti(Request $request, Darbuotojas $user)
    {
        $postData;
        if ($request->getMethod() == 'POST') {
            $vardas = $request->request->get('vardas');
            $pavarde = $request->request->get('pavarde');
            $telnr = $request->request->get('telnr');
            $epastas = $request->request->get('epastas');
            $adresas = $request->request->get('adresas');
            $postData = $request->request->get('role');
        }
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(Darbuotojas::class)->find($user);
        if (!$users) {
            throw $this->createNotFoundException(
                'No user found for name '.$user
            );
        }
        $users->setVardas($vardas);
        $users->SetPavarde($pavarde);
        $users->setElPastas($epastas);
        $users->setTelNr($telnr);
        $users->setAdresas($adresas);
        $users->setRole((int)$postData);
        $em->flush();
        if((int)$postData == 1)
        {
            $em->remove($users);
            $em->flush();
        }
        return $this->redirectToRoute('homepage');
    }
    /**
     * @Route("/darbuotojas/valandos/{id}", name="valanduivedimas")
     */
    public function ivesti(Request $request, Darbuotojas $user)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(Darbuotojas::class)->find($user);
        return $this->render('employee/hours.html.twig', [
            'user' => $user,
        ]);
    }
    /**
     * @Route("/darbuotojas/ivesti/{id}", name="valanduatnaujinimas")
     */
    public function atnaujinimas(Request $request, Darbuotojas $user)
    {
        $pradzia;
        $pabaiga;
        if ($request->getMethod() == 'POST') {
            $pradzia = $request->request->get('pradzia');
            $pabaiga = $request->request->get('pabaiga');
        }
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(Darbuotojas::class)->find($user);
        $users->setDarboPradzia(\DateTime::createFromFormat('H:i',$pradzia));
        $users->setDarboPabaiga(\DateTime::createFromFormat('H:i', $pabaiga));
        $em->flush();
        return $this->redirectToRoute('homepage');
    }
}