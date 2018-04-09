<?php

namespace App\Service;

use App\Repository\CommandRepository;

/**
* 
*/
class TicketCounter 
{
	private $command;
	
	function __construct(CommandRepository $command)
	{
		$this->command = $command;
	}

	


}