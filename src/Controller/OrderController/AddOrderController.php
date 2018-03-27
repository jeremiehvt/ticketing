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
		$country = new Country;
		$country->setName('Angleterre');


		$tickets = new Tickets;
		$tickets->setName('moi');
		$tickets->setFirstName('remoi');
		$tickets->addCountries($country);


		$command = new Command;
		$command->setEmail('me@me.com');
		$command->setTycketsType('demi-journée');
		$command->addTickets($tickets);

		$em = $this->getDoctrine()->getManager();
		$em->persist($tickets);

		$em->flush();

		

		return new response("bonjour");
		
	}
	
}