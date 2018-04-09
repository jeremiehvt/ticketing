<?php

namespace App\Service;


use App\Repository\PriceRepository;


/**
* 
*/
class PriceCalculator
{
	private $ticket;
	private $price;
	
	function __construct(PriceRepository $price, Ticket $Ticket)
	{
		
		$this->price = $price;
		$this->ticket = $ticket;
	}

	public function getPrice()
	{

	}
}