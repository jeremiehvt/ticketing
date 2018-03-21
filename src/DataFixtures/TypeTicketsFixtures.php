<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\TypeTickets;

class TypeTicketsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

    	$names = array('journée', 'demi-journée');

    	foreach ($names as $name) {

    		$typeTickets = new TypeTickets();
            $typeTickets->setName($name);
            $manager->persist($typeTickets);
    	}
        
        $manager->flush();
    }
}
