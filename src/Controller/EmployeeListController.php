<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        return $this->render('employee/list.html.twig', [
            'users' => $users,
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
    public function atnaujinti(Request $request, Darbuotojas $user)
    {
        $postData;
        if ($request->getMethod() == 'POST') {
            $postData = $request->request->get('role');
        }
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(Darbuotojas::class)->find($user);
        if (!$users) {
            throw $this->createNotFoundException(
                'No user found for name '.$user
            );
        }
        $users->setRole((int)$postData);
        $em->flush();
        if((int)$postData == 1)
        {
            $em->remove($users);
            $em->flush();
        }
        return $this->redirectToRoute('homepage');
    }
}