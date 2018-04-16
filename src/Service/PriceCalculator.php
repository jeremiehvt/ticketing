<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PriceRepository;
use App\Entity\Ticket;
use App\Entity\Price;

/**
* 
*/
class PriceCalculator
{
	private $ticket;
	private $age;
	private $rate;
	private $specialRate;
	private $price;
	private $em;
	
	public function __construct(EntityManagerInterface $em)
	{
			
		$this->em = $em;	
	}

	
	public function setPrice(Ticket $ticket)
	{
		$this->ticket = $ticket;

		//calcul age 
		$birthday = $this->ticket->getBirthday();
		$birthYear = $birthday->format('Y');

		$today = new \DateTime();
		$now = $today->format('Y');

		$this->age = $now - $birthYear;

		$this->specialRate = $ticket->getReduction();
		

		if (12 <= $this->age && $this->age <60 && $this->specialRate === false) {
			
			$this->rate = 'normal';
			$price = $this->em->getRepository(Price::class)->findOneBy(array('name' => $this->rate));
			$this->price = $price->getCost();

			return $this->price;

		} elseif (4 <= $this->age && $this->age <12 && $this->specialRate === false) {

			$this->rate = 'enfant';
			$price = $this->em->getRepository(Price::class)->findOneBy(array('name' => $this->rate));
			$this->price = $price->getCost();

			return $this->price;

		} elseif ($this->age >=60 && $this->specialRate === false) {

			$this->rate = 'senior';
			$price = $this->em->getRepository(Price::class)->findOneBy(array('name' => $this->rate));
			$this->price = $price->getCost();

			return $this->price;

		} elseif (0 <= $this->age && $this->age <4 && $this->specialRate === false) {

			$this->rate = 'gratuit';
			$price = $this->em->getRepository(Price::class)->findOneBy(array('name' => $this->rate));
			$this->price = $price->getCost();

			return $this->price;
			
		} elseif (12 < $this->age && $this->specialRate === true) {

			$this->rate = 'réduit';
			$price = $this->em->getRepository(Price::class)->findOneBy(array('name' => $this->rate));
			$this->price = $price->getCost();

			return $this->price;
		}

	}

}