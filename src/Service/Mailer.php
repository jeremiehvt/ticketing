<?php

namespace App\Service;

use App\Entity\Command;

/**
 * 
 * service : Mailer
 *
 */
class Mailer
{
	private $mail;
	private $templating;
	
	/**
	 * 
	 * @param class $swiftmailer
	 * @param class $twig_environment
	 */
	function __construct(\Swift_Mailer $mail, \Twig_Environment $templating)
	{
		$this->mail = $mail;
		$this->templating = $templating;
	}

	/**
	 * 
	 * @param entity $command
	 */
	public function sendMail(Command $command)
	{

		//send an email to the customers with details command in a pdf
		$message = (new \Swift_Message('Votre Commande'))
			->setFrom('billetterielouvre@malestroit.ovh')
			->setTo($command->getEmail())
			->setCharset('utf-8')
			->setContentType('text/html')
			;

			$logolouvre = $message->embed(\Swift_Image::fromPath('http://www.billetterielouvre.malestroit.ovh/public/img/logo.png'));

			$message->setBody(
				$this->templating->render('mail/commandmail.html.twig', array(
					'command'=>$command,
					'logo'=>$logolouvre	
				), 
				'text/html')
			)
			;

			$message->addPart(
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