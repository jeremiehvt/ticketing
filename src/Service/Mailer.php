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
			->setFrom('billetterielouvre@malestroit.ovh')
			->setTo($command->getEmail())
			->setCharset('utf-8')
			->setContentType('text/html')
			->setBody(
				$this->templating->render('mail/commandmail.html.twig', array(
					'command'=>$command,	
				), 
				'text/html')
			)
			 ->addPart(
            $this->templating->render(
                'mail/commandmail.text.twig',
                array('command'=>$command)
	            ),
	            'text/plain'
	        )
			;
			
			

		$this->mail->send($message);

	}
}