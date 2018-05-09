<?php

namespace App\Service;

use App\Entity\Command;

/**
* 
*/
class Mailer
{
	private $mail;
	private $templating;
	
	function __construct(\Swift_Mailer $mail, \Twig_Environment $templating)
	{
		$this->mail = $mail;
		$this->templating = $templating;
	}

	public function sendMail(Command $command)
	{
		//send an email to the customers with details command in a pdf
		$message = (new \Swift_Message('Votre Commande'))
			->setFrom('jeremiehvt@gmail.com')
			->setTo($command->getEmail())
			->setBody(
				$this->templating->render('mail/commandMail.html.twig', array(
					'command'=>$command
				), 'text/html')
			);

		$this->mail->send($message);

	}
}