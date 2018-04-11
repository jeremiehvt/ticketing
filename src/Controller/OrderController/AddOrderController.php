<?php

namespace App\Controller\OrderController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use App\Entity\Command;
use App\Entity\Ticket;
use App\Service\MessageGenerator;



class AddOrderController extends AbstractController
{
	/**
	* @Route("/addOrder", name="addOrder")
	*/
	public function addOrder(MessageGenerator $messageGenerator)
	{
		
		$message = $messageGenerator->getHappyMessage();
    	$this->addFlash('success', $message);
		return new Response($message);
	
	}
	
}