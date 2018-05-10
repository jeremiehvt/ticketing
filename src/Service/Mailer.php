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
			;
			$message->attach(
  			\Swift_Attachment::fromPath('../public/img/logo.png')->setFilename('cool.jpg'));
			$logo =  $message->embed(\Swift_Image::fromPath('../public/img/logo.png'));
			$message->setBody(

				$this->templating->render('mail/commandmail.html.twig', array(
					'command'=>$command,
					'logo'=>$logo,
				), 
				'text/html')
			);

		$this->mail->send($message);

	}
}