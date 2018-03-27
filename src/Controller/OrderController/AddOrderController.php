<?php

namespace App\Controller\OrderController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use App\Entity\Command;
use App\Entity\Tickets;
use App\Entity\Country;
use App\Entity\TycketsType;



class AddOrderController extends AbstractController
{
	/**
	* @Route("/addOrder", name="addOrder")
	*/
	public function addOrder()
	{
		$tickets = new Tickets;
		$tickets->setName('moi');
		$tickets->setFirstName('remoi');
		$tickets->setEmail('me@me.com');
		$tickets->setTicketsType('demi-journée');

		$command = new Command;
		$command->addTickets($tickets);

		$country = new Country;
		$country->setName('France');
		$country->addTickets($tickets);


		$em = $this->getDoctrine()->getManager();
		$em->persist($tickets);

		$em->flush();

		

		return new response("bonjour");
		
	}
	
}