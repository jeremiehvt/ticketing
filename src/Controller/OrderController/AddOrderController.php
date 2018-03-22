<?php

namespace App\Controller\OrderController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use App\Entity\Order;
use App\Entity\Tickets;



class AddOrderController extends Controller
{
	/**
	* @Route("/addOrder", name="addOrder")
	*/
	public function addOrder()
	{
		$order = new Order;

		$tickets = new Tickets;

		return new response("bonjour");
		
	}
	
}