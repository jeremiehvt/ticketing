<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PriceRepository;
use App\Entity\Ticket;
use App\Entity\Price;

/**
 * service : calcul ticketprice
 */
class PriceCalculator
{
	private $ticket;
	private $age;
	private $rate;
	private $specialRate;
	private $price;
	private $em;
	private $priceEntity;
	
	/**
	 * @param EntityManagerInterface
	 */
	public function __construct(EntityManagerInterface $em)
	{
			
		$this->em = $em;	
	}

	/**
	 * @param ticket
	 */
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

		$priceEntity = $this->em->getRepository(Price::class)->findAll();
		

		if (12 <= $this->age && $this->age <60 && $this->specialRate === false) {
			
			foreach ($priceEntity as $cost) {
				$this->price = $cost->getNormal();
			}
			
			return $this->price;

		} elseif (4 <= $this->age && $this->age <12) {

			foreach ($priceEntity as $cost) {
				$this->price = $cost->getChildren();
			}

			return $this->price;

		} elseif ($this->age >=60 && $this->specialRate === false) {

			foreach ($priceEntity as $cost) {
				$this->price = $cost->getSenior();
			}

			return $this->price;

		} elseif (0 <= $this->age && $this->age <4) {

			foreach ($priceEntity as $cost) {
				$this->price = $cost->getFree();
			}

			return $this->price;
			
		} elseif (12 < $this->age && $this->specialRate === true) {

			foreach ($priceEntity as $cost) {
				$this->price = $cost->getReduct();
			}

			return $this->price;
		}

		
	}

}