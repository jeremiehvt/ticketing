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
		

		$tickets2 = new Tickets;
		$tickets2->setName('moi');
		$tickets2->setFirstName('remoi');
		
		

		$command = new Command;
		$command->setEmail('me@me.com');
		$command->setTycketsType('demi-journée');
		$command->addTickets($tickets);
		$command->addTickets($tickets2);


		$em = $this->getDoctrine()->getManager();
		$em->persist($tickets);
		$em->persist($tickets2);
		$em->persist($command);

		$em->flush();

		
		return new response("bonjour");
		
	}
	
}