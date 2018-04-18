<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Price;

class PriceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        	
        	$price = new Price();
	        $price->setNormal(16);
	        $price->setChildren(8);
            $price->setSenior(12);
            $price->setReduct(10);
            $price->setFree(0);


	        $manager->persist($price);

        $manager->flush();
    }
}
