<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Uzsakymas;
use App\Entity\Automobilis;

class OrdersController extends Controller
{
    /**
     * @Route("/uzsakymai", name="uzsakymai")
     */
    public function index()
    {

        return $this->render('orders/index.html.twig', [

        ]);
    }
    /**
     * @Route("/naujasuzsakymas", name="naujasuzsakymas")
     */
    public function NewOrder(Request $request)
    {
        $entityManager = $this->getDoctrine()->getRepository(Uzsakymas::class);
        $uzsakymai = $entityManager->findAll();

        $aikstele = "0";
        if($request->get('aikstele') !== null) $aikstele = $request->get('aikstele');
        if($aikstele !== "0"){
            $carsManager = $this->getDoctrine()->getRepository(Automobilis::class);
            $aikstelesId = (int)$request->get('aikstele');
            $automobiliai = $carsManager->findBy(
                ['fk_AIKSTELEaiksteles_id' => $aikstelesId]
            );
            return $this->render('orders/neworder.html.twig', [
                'selectCar' => true,
                'automobiliai' => $automobiliai
            ]);
        }
        else {
            return $this->render('orders/neworder.html.twig', [
                'selectCar' => false,
            ]);
        }
    }
}