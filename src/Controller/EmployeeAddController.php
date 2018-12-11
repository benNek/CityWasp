<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Klientas;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class EmployeeAddController extends Controller
{
    /**
     * @Route("/darbuotojas/prideti", name="darbuotojas_prideti")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Klientas::class);
        $users = $repository->findAll();
        //dd($users);
        return $this->render('employee/add.html.twig', [
            'users' => $users,
        ]);
    }
    /**
     * @Route("/darbuotojas/redagavimas/{id}", name="redaguoti")
     */
    public function redaguoti(Klientas $user)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(Klientas::class)->find($user);
        return $this->render('employee/edit.html.twig', [
            'user' => $user,
        ]);
    }
    /**
     * @Route("/darbuotojas/redagavimas/pridejimas/{id}", name="prideti")
     * @param Request $request
     */
    public function prideti(Request $request, Klientas $user)
    {
        $postData;
        if ($request->getMethod() == 'POST') {
            $postData = $request->request->get('role');
        }
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(Klientas::class)->find($user);
        if (!$users) {
            throw $this->createNotFoundException(
                'No user found for name '.$user
            );
        }
        $users->setRole((int)$postData);
        $em->flush();
        return $this->redirectToRoute('homepage');
    }
}