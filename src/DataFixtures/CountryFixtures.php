<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Country;

class CountryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	$names = array('Angleterre', 'Allemagne', 'Belgique', 'France');

    	foreach ($names as $name) {
    		$country = new Country();
            $country->setName($name);

            $manager->persist($country);
    	}

        $manager->flush();
    }
}
