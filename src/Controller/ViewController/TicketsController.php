<?php
namespace App\Controller\ViewController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use App\Form\CommandType;
use App\Entity\Command;
use App\Entity\Tickets;

/**
* 
*/
class TicketsController extends Abstractcontroller
{
	/**
	* @Route("/billetterie", name="tickets")
	*/
	public function tickets(Request $request) 
	{
		$command = new Command();

		$form = $this->createForm(CommandType::class, $command);


		if ($request->isMethod('POST')) {
			$form->handleRequest($request)->isValid();

			$em = $this->getDoctrine()->getManager();
			$em->persist($tickets);
			
			$em->persist($command);

			$em->flush();

			
			return new response("bonjour");
		}

		return $this->render('tickets/tickets.html.twig', array(
			'form'=>$form->createView(),
		));
	}	
}