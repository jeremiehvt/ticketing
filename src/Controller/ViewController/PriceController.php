<?php

namespace App\Controller\ViewController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PriceRepository;
use App\Entity\Price;

class PriceController extends AbstractController
{
    /**
     * @Route("/price", name="price")
     */
    public function showPrice(Request $request)
    {

    	$priceList = $this->getDoctrine()->getRepository(Price::class)->findAll();

        return $this->render('price/showList.html.twig', array(
            'priceList' => $priceList,
        ));
    }
}
