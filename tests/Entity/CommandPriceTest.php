<?php

namespace App\Tests\Entity;

use App\Entity\Command;
use App\Entity\Ticket;
use PHPUnit\Framework\TestCase;


class CommandPriceTest extends TestCase
{
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
		$ticket->setPrice(16);
		$ticket->setCountry('france');

		$command->addTicket($ticket);
		$command->setPrice();
		$result = $command->getPrice();

		$this->assertEquals(16, $result);

	}
}