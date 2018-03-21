<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\TycketsType;

class TypeTicketsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

    	$names = array('journée', 'demi-journée');

    	foreach ($names as $name) {

    		$typeTickets = new TycketsType();
            $typeTickets->setType($name);
            $manager->persist($typeTickets);
    	}
        
        $manager->flush();
    }
}
