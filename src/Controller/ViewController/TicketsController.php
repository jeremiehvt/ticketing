<?php
namespace App\Controller\ViewController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use App\Form\CommandType;
use App\Entity\Command;
use App\Entity\Ticket;

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

		//for ($i=0; $i < 5; $i++) { }

			//$ticket = new Ticket();
			//$ticket->setName('me');
			//$ticket->setFirstName('me');
			//$command->addTickets($ticket);
		
		

		$form = $this->createForm(CommandType::class, $command);

		$form->handleRequest($request);


		if ($form->isSubmitted() && $form->isValid()) {
			
			$em = $this->getDoctrine()->getManager();
			
			$em->persist($command);

			$em->flush();

			
			return new response("bonjour");
		}

		return $this->render('tickets/tickets.html.twig', array(
			'form'=>$form->createView(),
		));
	}	
}