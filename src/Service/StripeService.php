<?php

namespace App\Service;

use App\Entity\Command;

/**
 * service : stripe 
 */
class StripeService 
{
	/**
	 * @param command
	 */
	public function sendPayment(Command $command)
	{
		\Stripe\Stripe::setApiKey("sk_test_waPjYO9CcyAn5z3n1g2789d8");

		$token = $_POST['stripeToken'];



		try {
				$charge = \Stripe\Charge::create([
				'amount'=> $command->getPrice()*100,
				'currency'=>'eur',
				'source' => $token,
				'description' => 'paiement commande billet musée Louvre',
			]);
			} catch (\Stripe\Error\Card $e) {

				  $body = $e->getJsonBody();
				  $err  = $body['error'];

				  print('Status is:' . $e->getHttpStatus() . "\n");
				  print('Type is:' . $err['type'] . "\n");
				  print('Code is:' . $err['code'] . "\n");
				  // param is '' in this case
				  print('Param is:' . $err['param'] . "\n");
				  print('Message is:' . $err['message'] . "\n");
				} catch (\Stripe\Error\RateLimit $e) {
				  // Too many requests made to the API too quickly
				} catch (\Stripe\Error\InvalidRequest $e) {
				  // Invalid parameters were supplied to Stripe's API
				} catch (\Stripe\Error\Authentication $e) {
				  // Authentication with Stripe's API failed
				  // (maybe you changed API keys recently)
				} catch (\Stripe\Error\ApiConnection $e) {
				  // Network communication with Stripe failed
				} catch (\Stripe\Error\Base $e) {
				  // Display a very generic error to the user, and maybe send
				  // yourself an email
				} catch (Exception $e) {
				  // Something else happened, completely unrelated to Stripe
				}

				return $this;
	}
}