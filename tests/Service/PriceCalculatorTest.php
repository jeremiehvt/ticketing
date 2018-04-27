<?php

namespace App\Tests\Service;

use App\Entity\Ticket;
use App\Entity\Command;
use App\Entity\Price;
use App\Service\PriceCalculator;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PriceRepository;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
* 
*/
class PriceCalculatorTest extends WebTestCase
{
	private $new;


	public function assertCommandAll()
	{
		self::bootKernel();

        // returns the real and unchanged service container
        

         $client = static::createClient();
        $container = $client->getContainer();

        $new = self::$container->get('monolog.logger');      
	}
	
	public function testSetPrice()
	{
		//$this->assertCommandAll();

		$date = new \DateTime();
		$date->setDate(1992, 3, 26);


		$command = new Command();
		$command->setEmail('me@me.com');
		$command->setTycketsType('journée');

		$ticket = new Ticket();
		$ticket->setName('havart');
		$ticket->setFirstName('jérémie');
		$ticket->setBirthday($date);
		$ticket->setReduction(true);
		$ticket->setCountry('france');

		$command->addTicket($ticket);

		$price = new Price();
		$price->setNormal(16);
		$price->setSenior(12);
		$price->setChildren(8);
		$price->setFree(0);
		$price->setReduct(10);

		$priceRepository = $this->createMock(PriceRepository::class);
		$priceRepository->method('findAll')
            ->willReturn($price);


		$em = $this->createMock(EntityManagerInterface::class);
		$em->method('getRepository')
            ->willReturn($priceRepository);

        /*$argu = array($em);
	
		$priceCalculator = $this->getMockBuilder(PriceCalculator::class);
		$priceCalculator->setConstructorArgs($argu)
			->getMock();


		$container = $this->getMock(ContainerInterface::class);
		$container->expects($this->once())
            ->method("get")
            ->with($this->equalTo('App\Service\PriceCalculator'))
            ->will($this->returnValue($priceCalculator));*/

        $priceCalculator = new PriceCalculator($em);
        $result = $priceCalculator->setPrice($ticket);

        		
	}

	
}