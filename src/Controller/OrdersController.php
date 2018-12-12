<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Uzsakymas;
use App\Entity\Automobilis;
use App\Entity\Aikstele;
use App\Entity\Saskaita;

class OrdersController extends Controller
{
    /**
     * @Route("/uzsakymai", name="uzsakymai")
     */
    public function index()
    {
        $id = $this->getUser()->getId();

        $ordersql = $this->getDoctrine()->getRepository(Uzsakymas::class)->getAllOrderData($id);
        //dd($ordersql);

        return $this->render('orders/index.html.twig', [
                'orders' => $ordersql
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
    /**
     * @Route("/saveorder", name="saveorder")
     */
    public function SaveOrder(Request $request)
    {
        date_default_timezone_set('Europe/Vilnius');
        $entityManager = $this->getDoctrine()->getManager();
        $ordersManager = $this->getDoctrine()->getRepository(Uzsakymas::class);
        $id = $this->getUser()->getId();
        if(!empty($request->get('ordersubmit'))){
            if($request->get('aikstele') !== "0" && !empty($request->get('aikstele'))) $aikstele = $request->get('aikstele');
            if($request->get('automobilis') !== "0" && !empty($request->get('automobilis')))$automobilis = $request->get('automobilis');
            $order = new Uzsakymas();
            $time = date('Y-m-d H:i:s');
            $order->setPaemimoData(\DateTime::createFromFormat('Y-m-d H:i:s', $time));
            $order->setUzsakymoBusena(3);
            $order->setAutomobilioId((int)$automobilis);
            $order->setKlientoId($id);
            $entityManager->persist($order);
            $entityManager->flush();
            return $this->redirectToRoute('uzsakymai');
        }
        $orders = $ordersManager->findBy(['fk_KLIENTAS' => $id]);
        return $this->render('orders/index.html.twig', [
                'orders' => $orders
        ]);    
    }
    /**
     * @Route("/redaguotiuzsakyma", name="redaguotiuzsakyma")
     */
    public function EditOrder(Request $request)
    {
        //$id = $this->getUser()->getId();
        if(!empty($request->get('submitEdit'))){
            $id = (int)$request->get('orderid');
            $ordersql = $this->getDoctrine()->getRepository(Uzsakymas::class)->getOrderById($id);
            //return $this->redirectToRoute('uzsakymai');
        }
        return $this->render('orders/editOrder.html.twig', [
            'order' => $ordersql[0]
        ]);
    }
    /**
     * @Route("/trintiuzsakyma", name="trintiuzsakyma")
     */
    public function DeleteOrder(Request $request)
    {
        if(!empty($request->get('submitCancel'))){
            $entityManager = $this->getDoctrine()->getManager();

            $id = (int)$request->get('orderid');
            $ordersManager = $this->getDoctrine()->getRepository(Uzsakymas::class);
            $order = $ordersManager->findBy(['id_UZSAKYMAS' => $id]);
            $order[0]->setUzsakymoBusena(5);
            $entityManager->persist($order[0]);
            $entityManager->flush();
            //$ordersql = $this->getDoctrine()->getRepository(Uzsakymas::class)->getOrderById($id);

        }
        return $this->redirectToRoute('uzsakymai');
    }
    /**
     * @Route("/baigtiuzsakyma", name="baigtiuzsakyma")
     */
    public function FinishOrder(Request $request)
    {
        date_default_timezone_set('Europe/Vilnius');
        if(!empty($request->get('submitFinish'))){
            $entityManager = $this->getDoctrine()->getManager();

            $id = (int)$request->get('orderid');
            $ordersManager = $this->getDoctrine()->getRepository(Uzsakymas::class);
            $moneyManager = $this->getDoctrine()->getRepository(Saskaita::class);
            $carsManager = $this->getDoctrine()->getRepository(Automobilis::class);
            $order = $ordersManager->findBy(['id_UZSAKYMAS' => $id]);
            $fromDate = $order[0]->getPaemimoData();
            $time = date('Y-m-d H:i:s');
            $order[0]->setGrazinimoData(\DateTime::createFromFormat('Y-m-d H:i:s', $time));
            $toDate = $order[0]->getGrazinimoData();
            $skirtumas = ($order[0]->getGrazinimoData())->diff($fromDate);
            $skirtumas = $skirtumas->format("%i");
          //  dd($skirtumas);
            $car = $carsManager->findBy(['id_AUTOMOBILIS' => $order[0]->getAutomobilioId()]);
            $price = (float)$car[0]->getMinutesKaina() * (float)$skirtumas;
            $time = date('Y-m-d H:i:s');
            $order[0]->setGrazinimoData(\DateTime::createFromFormat('Y-m-d H:i:s', $time));
            $order[0]->setUzsakymoBusena(4);
            $entityManager->persist($order[0]);
            $entityManager->flush();

            $saskaita = new Saskaita();

            $saskaita->setSuma((float)$price);
            $time = date('Y-m-d H:i:s');
            $saskaita->setData(\DateTime::createFromFormat('Y-m-d H:i:s', $time));
            $saskaita->setFkUZSAKYMASuzsakymoId($id);
            $entityManager->persist($saskaita);
            $entityManager->flush();
        }
        return $this->redirectToRoute('uzsakymai');
    }
    /**
     * @Route("/filtruotiuzsakymus", name="filtruotiuzsakymus")
     */
    public function FilterOrders(Request $request)
    {
        /*//$id = $this->getUser()->getId();
        if(!empty($request->get('submitEdit'))){
            $id = (int)$request->get('orderid');
            $ordersql = $this->getDoctrine()->getRepository(Uzsakymas::class)->getOrderById($id);
            //return $this->redirectToRoute('uzsakymai');
        }*/
        date_default_timezone_set('Europe/Vilnius');
        if(!empty($request->get('Filtruoti'))){
            $dataNuo = $request->get('datanuo');
            $dataIki = $request->get('dataiki');
            $stop_date = date('Y-m-d', strtotime($dataIki . ' +1 day'));
            if(!empty($dataNuo) && !empty($stop_date)){
                $id = $this->getUser()->getId();
                $ordersql = $this->getDoctrine()->getRepository(Uzsakymas::class)->getOrdersByIdAndDate($id, $dataNuo, $stop_date);
            }
            else {
                return $this->redirectToRoute('uzsakymai');
            }
        }
        return $this->render('orders/index.html.twig', [
            'orders' => $ordersql
        ]);
    }
}