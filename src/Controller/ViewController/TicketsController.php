<?php
namespace App\Controller\ViewController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Constraint;
use App\Form\CommandType;
use App\Entity\Command;
use App\Entity\Ticket;
use App\Entity\Price;
use App\Service\PriceCalculator;
use App\Service\TicketCounterByDate;
use App\Repository\PriceRepository;

/**
* 
*/
class TicketsController extends Abstractcontroller
{
	/**
	* @Route("/billetterie", name="tickets")
	*/
	public function tickets(Request $request, PriceCalculator $priceCalculator) 
	{
		$command = new Command();


		$form = $this->createForm(CommandType::class, $command);

		$form->handleRequest($request);


		if ($form->isSubmitted() && $form->isValid()) {
			
			//$priceList = $this->getDoctrine()->getRepository(Price::class)->findAll();
			
			$tickets = $command->getTickets();


		
			foreach ($tickets as $ticket) {				
				
				$priceCalculator->setTicket($ticket);
				$priceCalculator->setSpecialRate($ticket);
				$priceCalculator->setAge();
				$priceCalculator->setPrice();
				
				$ticket->setPrice($priceCalculator->getPrice());
									
			}
						
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