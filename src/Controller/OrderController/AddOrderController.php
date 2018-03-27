<?php

namespace App\Controller\OrderController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use App\Entity\Command;
use App\Entity\Tickets;



class AddOrderController extends AbstractController
{
	/**
	* @Route("/addOrder", name="addOrder")
	*/
	public function addOrder(Request $request)
	{


		
		if ($request->method('POST') && $form->handleRequest($request)->isValid()) {
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($tickets);
			
			$em->persist($command);

			$em->flush();

			
			return new response("bonjour");
		}

		
		
	}
	
}