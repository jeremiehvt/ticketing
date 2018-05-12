<?php

namespace App\Controller\StripeController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Command;
use App\Service\StripeService;
use App\Service\Mailer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;





class PaymentController extends AbstractController
{
	/**
	* @Route("/paiement-{command_id}", name="payment", requirements={"command_id"="\w+"})
	* @ParamConverter("command", options={"mapping":{"command_id": "token"}})
	* @Method({"GET"})
	*/
	public function payment(Request $request, Command $command, StripeService $stripe, Mailer $mailer)
	{
		if ($command->getPaid() === false) {

			if ($command->getPrice() === 0) {
				$mailer->sendMail($command);

			} else {
				$stripe->sendPayment($command);
				$mailer->sendMail($command);
			}

			//set command paid to true
			$em = $this->getDoctrine()->getManager();
			$command->setPaid(true);
			$em->persist($command);
			$em->flush();

			//redirect the user to the homepage
			$this->addFlash('warning', 'votre commande à bien été payé un email contenant votre commande va vous être envoyé dans les prochaines minutes.');
			return $this->redirectToRoute('homepage');
		} else {
			throw new AccessDeniedException("vous avez déjà payé votre commande");
		}
	}
	
}