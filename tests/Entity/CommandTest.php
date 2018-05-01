<?php

namespace App\Tests\Entity;

use App\Entity\Command;
use App\Entity\Ticket;
use PHPUnit\Framework\TestCase;



class CommandTest extends TestCase
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
		$ticket->setPrice(20);
		$ticket->setCountry('france');

		$command->addTicket($ticket);
		$command->setPrice();
		$command->getNumberOfTickets();

		$result = $command->getNumberOfPlaces();

		$this->assertNotNull($result);
		$this->assertGreaterThan(0, $result);

	}

	public function testGetPriceIsNotNull()
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
		$ticket->setPrice(19);
		$ticket->setCountry('france');

		$command->addTicket($ticket);
		$command->setPrice();
		$result = $command->getPrice();

		$this->assertNotNull($result);
		$this->assertGreaterThan(0, $result);

	}

	public function testGetTotalPriceCommand()
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
		$ticket->setPrice(19);
		$ticket->setCountry('france');

		$ticketDeux = new Ticket();
		$ticketDeux->setName('havart');
		$ticketDeux->setFirstName('jérémie');
		$ticketDeux->setBirthday($bDay);
		$ticketDeux->setPrice(19);
		$ticketDeux->setCountry('france');

		$command->addTicket($ticket);
		$command->addTicket($ticketDeux);

		$command->setPrice();
		$result = $command->getPrice();

		$this->assertNotNull($result);
		$this->assertSame(38, $result);

	}
}