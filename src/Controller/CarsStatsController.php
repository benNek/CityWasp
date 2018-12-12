<?php

namespace App\Controller;

use App\Entity\Automobilis;
use App\Entity\Uzsakymas;
use App\Entity\Marke;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarsStatsController extends Controller
{
    /**
     * @Route("/automobiliu-statistika", name="automobiliu-statistika")
     */
    public function index()
    {
        $carsCount = $this->getDoctrine()->getRepository(Automobilis::class)->getCount();
        $ordersCount = $this->getDoctrine()->getRepository(Uzsakymas::class)->getTotalTrips();
        $averageAge = date("Y") - floor($this->getDoctrine()->getRepository(Automobilis::class)->getAverageAge());
        $averagePrice = round($this->getDoctrine()->getRepository(Automobilis::class)->getAveragePrice(), 2);

        $markesId = $this->getDoctrine()->getRepository(Automobilis::class)->getMostPopularManufacturer();
        $marke = $this->getDoctrine()->getRepository(Marke::class)->findById($markesId)->getPavadinimas();

        return $this->render('cars/stats.html.twig', [
            'controller_name' => 'CarsStatsController',
            'cars' => $carsCount,
            'orders' => $ordersCount,
            'age' => $averageAge,
            'price' => $averagePrice,
            'marke' => $marke
        ]);
    }
}