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
        $price->setNormal(20);
        $price->setChildren(6);
        $price->setSenior(15);
        $price->setReduct(9);
        $price->setFree(0);


        $manager->persist($price);

        $manager->flush();
    }
}
