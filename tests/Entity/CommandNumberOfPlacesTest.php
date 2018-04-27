<?php

namespace App\Tests\Entity;

use App\Entity\Command;
use App\Entity\Ticket;
use PHPUnit\Framework\TestCase;



class CommandNumberOfPlacesTest extends TestCase
{
	public function testGetNumberOfPlacesIsNotNull()
	{
		$date = new \DateTime();
		$bDay = $date->setDate(1992, 3, 26);

		$command = new Command();
		$command->setEmail('me@me.com');
		$command->setTycketsType('journée');

		$ticket = new Ticket();
		$ticket->setName('havart');
		$ticket->setFirstName('jérémie');
		$ticket->setBirthday($bDay);
		$ticket->setPrice(16);
		$ticket->setCountry('france');

		$command->addTicket($ticket);
		$command->setPrice();
		$command->getNumberOfTickets();

		$result = $command->getNumberOfPlaces();

		$this->assertGreaterThan(0, $result);

	}
}