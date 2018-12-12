<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Automobilis;
use App\Form\CarForm;

class CarPageController extends Controller
{
    // /**
    //  * @Route("/automobilis", name="automobilis")
    //  */
    // public function index()
    // {
    //     $form = $this->createForm(CarForm::class, $user);
    //     return $this->render('cars/car.html.twig', [
    //         'controller_name' => 'CarPageController',
    //     ]);
    // }

    /**
     * @Route("/automobilis", name="automobilis-naujas")
     */
    public function addCar(Request $request)
    {
        $car = new Automobilis();

        $form = $this->createForm(CarForm::class, $car);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($car);
            $em->flush();
            return $this->redirectToRoute('automobiliai');
        }

        return $this->render('cars/car.html.twig', 
            array('form' => $form->createView())
        );
    }

        /**
     * @Route("/automobilis/redaguoti", name="automobilis-redaguoti")
     */
    public function editCar(Request $request)
    {
        $id = $request->query->get('id');
        $car = $this->getDoctrine()->getRepository(Automobilis::class)->findById($id);

        $form = $this->createForm(CarForm::class, $car);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->merge($car);
            $em->flush();
            return $this->redirectToRoute('automobiliai');
        }

        return $this->render('cars/car.html.twig', 
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/automobilis/pasalinti", name="automobilis-pasalinti")
     */
    public function removeCar(Request $request)
    {
        $id = $request->query->get('id');
        $car = $this->getDoctrine()->getRepository(Automobilis::class)->findById($id);

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($car);
        $em->flush();

        return $this->redirectToRoute('automobiliai');
    }

    
}