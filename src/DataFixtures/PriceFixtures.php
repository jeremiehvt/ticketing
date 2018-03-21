<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Price;

class PriceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $datas = array('normal' => 16, 'enfant' => 8, 'senior' => 12, 'réduit' => 10,);

        foreach ($datas as $key => $data) {
        	
        	$price = new Price();
	        $price->setName($key);
	        $price->setCost($data);


	        $manager->persist($price);
        }

        

        $manager->flush();
    }
}
