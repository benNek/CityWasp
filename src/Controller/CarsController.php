<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Automobilis;
use App\Entity\CarFilter;
use App\Form\FiltersForm;

class CarsController extends Controller
{
    /**
     * @Route("/automobiliai", name="automobiliai")
     */
    public function index(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(Automobilis::class);
        $cars = $repo->findAll();
        $filters = new CarFilter();
        $form = $this->createForm(FiltersForm::class, $filters);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $filteredCars = $repo->FindByMarke($form["marke"]->getData());
            $cars = self::intersect($cars, $filteredCars);

            $filteredCars = $repo->FindByPavaruDeze($form["pavaru_deze"]->getData());
            $cars = self::intersect($cars, $filteredCars);
            
            if($form["metai_nuo"]->getData() != null) {
                $filteredCars = $repo->FindFromYear($form["metai_nuo"]->getData());
                $cars = self::intersect($cars, $filteredCars);
            }
            if($form["metai_iki"]->getData() != null) {
                $filteredCars = $repo->FindToYear($form["metai_iki"]->getData());
                $cars = self::intersect($cars, $filteredCars);
            }

            if($form["kaina_nuo"]->getData() != null) {
                $filteredCars = $repo->FindFromPrice($form["kaina_nuo"]->getData());
                $cars = self::intersect($cars, $filteredCars);
            }
            if($form["kaina_iki"]->getData() != null) {
                $filteredCars = $repo->FindToPrice($form["kaina_iki"]->getData());
                $cars = self::intersect($cars, $filteredCars);
            }
        }

        return $this->render('cars/index.html.twig', [
            'controller_name' => 'CarsController', 'cars' => $cars, 'form' => $form->createView()
        ]);
    }

    function intersect($all, $filtered) {
        return array_uintersect($all, $filtered, function($a, $b) {
            return strcmp(spl_object_hash($a), spl_object_hash($b));
        });
    }

    

}