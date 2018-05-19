<?php

namespace App\Service;

use App\Repository\CommandRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TicketRepository;
use App\Entity\Ticket;
use App\Entity\Command;

/**
* 
*/
class TicketCounterByDate
{
	private $em;
	private $count;	

	/**
	 * @param EntityManagerInterface
	 */
	public function __construct(EntityManagerInterface $em)
	{
		$this->em = $em;
		
	}

	/**
	 * @param date
	 * @return count
	 */
	public function countByDate($date)
	{
	

		$commands = $this->em->getRepository(Command::class)->findBy(array('visitDay' => $date));

		foreach ($commands as $command) {
			
			$this->count += $command->getNumberOfPlaces();

		}

		return $this->count;
	}
}