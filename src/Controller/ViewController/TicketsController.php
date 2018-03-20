<?php
namespace App\Controller\ViewController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 


/**
* 
*/
class TicketsController extends controller
{
	/**
	* @Route("/tickets", name="tickets")
	*/
	public function tickets() {

		return $this->render('tickets/tickets.html.twig');
	}
	
}