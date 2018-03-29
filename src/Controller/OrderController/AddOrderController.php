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
	public function addOrder()
	{
		$em = $this->getDoctrine()->getManager();
		

		$advert = new Tickets();
		$advert->setName('me');
		$advert->setFirstName('me');
		$advert->setCountry('france');

		
		$command = new Command();
		$command->setEmail('me@me.com');
		$command->setTycketsType('journée');
		$command->addTickets($advert);

		$em->persist($command);
		$em->flush();

		return new Response('ok');
	
	}
	
}