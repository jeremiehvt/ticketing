<?php

namespace App\Tests\Service;

use App\Entity\Ticket;
use App\Entity\Command;
use App\Service\PriceCalculator;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class PriceCalculatorTest extends WebTestCase
{
	private $em;

	protected function setUp()
	{
		$kernel = static::createKernel();
        $kernel->boot();
        $this->em = $kernel
            ->getContainer()
            ->get('doctrine.orm.entity_manager');
	}

	protected function tearDown()
	{
		$this->em = null;
	}
	
	public function testSetPriceWithReduction()
	{

		self::setUp();

		$command = new Command();
		$command->setEmail('me@me.com');
		$command->setTycketsType('journée');

		$ticket = new Ticket();
		$ticket->setName('havart');
		$ticket->setFirstName('jérémie');
		$ticket->setBirthday(new \DateTime('1992-3-26'));
		$ticket->setReduction(true);
		$ticket->setCountry('france');

		$command->addTicket($ticket);


        $priceCalculator = new PriceCalculator($this->em);
        $result = $priceCalculator->setPrice($ticket);

        $this->assertNotNull($result);
        $this->assertSame(9, $result);

        self::tearDown();	
	}


	public function testSetPriceWithoutReduction()
	{
		self::setUp();

		$command = new Command();
		$command->setEmail('me@me.com');
		$command->setTycketsType('journée');

		$ticket = new Ticket();
		$ticket->setName('havart');
		$ticket->setFirstName('jérémie');
		$ticket->setBirthday(new \DateTime('1992-3-26'));
		$ticket->setReduction(false);
		$ticket->setCountry('france');

		$command->addTicket($ticket);


        $priceCalculator = new PriceCalculator($this->em);
        $result = $priceCalculator->setPrice($ticket);

        $this->assertNotNull($result);
        $this->assertGreaterThanOrEqual(0, $result);

        self::tearDown();
	}

	public function testSetPriceIsSenior()
	{
		self::setUp();

		$command = new Command();
		$command->setEmail('me@me.com');
		$command->setTycketsType('journée');

		$ticket = new Ticket();
		$ticket->setName('havart');
		$ticket->setFirstName('jérémie');
		$ticket->setBirthday(new \DateTime('1950-3-26'));
		$ticket->setReduction(false);
		$ticket->setCountry('france');

		$command->addTicket($ticket);


        $priceCalculator = new PriceCalculator($this->em);
        $result = $priceCalculator->setPrice($ticket);

        $this->assertNotNull($result);
        $this->assertSame(15, $result);

        self::tearDown();
	}

	public function testSetPriceIsChildren()
	{
		self::setUp();

		$command = new Command();
		$command->setEmail('me@me.com');
		$command->setTycketsType('journée');

		$ticket = new Ticket();
		$ticket->setName('havart');
		$ticket->setFirstName('jérémie');
		$ticket->setBirthday(new \DateTime('2013-3-26'));
		$ticket->setReduction(false);
		$ticket->setCountry('france');

		$command->addTicket($ticket);


        $priceCalculator = new PriceCalculator($this->em);
        $result = $priceCalculator->setPrice($ticket);

        $this->assertNotNull($result);
        $this->assertSame(6, $result);

        self::tearDown();
	}

	public function testSetPriceIsNormal()
	{
		self::setUp();

		$command = new Command();
		$command->setEmail('me@me.com');
		$command->setTycketsType('journée');

		$ticket = new Ticket();
		$ticket->setName('havart');
		$ticket->setFirstName('jérémie');
		$ticket->setBirthday(new \DateTime('1992-3-26'));
		$ticket->setReduction(false);
		$ticket->setCountry('france');

		$command->addTicket($ticket);


        $priceCalculator = new PriceCalculator($this->em);
        $result = $priceCalculator->setPrice($ticket);

        $this->assertNotNull($result);
        $this->assertSame(20, $result);

        self::tearDown();
	}

	public function testSetPriceIsFree()
	{
		self::setUp();

		$command = new Command();
		$command->setEmail('me@me.com');
		$command->setTycketsType('journée');

		$ticket = new Ticket();
		$ticket->setName('havart');
		$ticket->setFirstName('jérémie');
		$ticket->setBirthday(new \DateTime('2016-3-26'));
		$ticket->setReduction(false);
		$ticket->setCountry('france');

		$command->addTicket($ticket);


        $priceCalculator = new PriceCalculator($this->em);
        $result = $priceCalculator->setPrice($ticket);

        $this->assertNotNull($result);
        $this->assertSame(0, $result);

        self::tearDown();
	}
	
}