<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Uzsakymas;
use App\Entity\Automobilis;
use App\Entity\Aikstele;

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
        $carsManager = $this->getDoctrine()->getRepository(Automobilis::class);
        $aikstelesManager = $this->getDoctrine()->getRepository(Aikstele::class);
        $uzsakymai = $entityManager->findAll();

        if(empty($aikstele)) $aikstele = "0";
        if(empty($automobilis)) $automobilis = "0";

        if($request->get('aikstele') !== "0" && !empty($request->get('aikstele'))) $aikstele = $request->get('aikstele');
        if($request->get('automobilis') !== "0" && !empty($request->get('automobilis')))$automobilis = $request->get('automobilis');
        
        if($aikstele === "0" && $automobilis === "0") {
            $aikst = $aikstelesManager->findAll();
            return $this->render('orders/neworder.html.twig', [
                'aikst' => $aikst,
                'selectCar' => false,
                'selectAikstele' => true,
                'bothSelected' => false,
                'aikstele' => $aikstele,
                'automobilis' => $automobilis
            ]);
        }
        if($aikstele !== "0" && $automobilis === "0"){
            $aikstelesId = (int)$request->get('aikstele');
            $automobiliai = $carsManager->findBy(
                ['fk_AIKSTELEaiksteles_id' => $aikstelesId]
            );
            return $this->render('orders/neworder.html.twig', [
                'selectCar' => true,
                'selectAikstele' => false,
                'bothSelected' => false,
                'automobiliai' => $automobiliai,
                'aikstele' => $aikstele,
                'automobilis' => $automobilis
            ]);
        }
        if($aikstele !== "0" && $automobilis !== "0"){
            $pasirinktasAutomobilis = $carsManager->findBy(
                ['id_AUTOMOBILIS' => (int)$automobilis]
            );
            return $this->render('orders/neworder.html.twig', [
                'selectCar' => false,
                'selectAikstele' => false,
                'bothSelected' => true,
                'automobiliai' => null,
                'aikstele' => $aikstele,
                'automobilis' => $automobilis,
                'pasirinktasAutomobilis' => $pasirinktasAutomobilis
            ]);
        }

    }
}