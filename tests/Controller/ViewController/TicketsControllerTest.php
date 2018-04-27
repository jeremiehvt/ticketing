<?php

namespace App\Tests\Controller\ViewController;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class TicketsControllerTest extends WebTestCase
{

    public function testNavBarLogoLink()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/billetterie');

        $logoLink = $crawler->selectLink('logo')->link();

        $crawler = $client->click($logoLink);

        $info = $crawler->filter('h2')->text();
        $this->assertSame("Bonjour, et bienvenue sur la billetterie du louvre", $info);

    }


     /*public function testForm()
    {
    	$client = static::createClient();
	    $crawler = $client->request('GET', '/billetterie');

        $form = $crawler->selectButton('Commander')->form();

         $form['command']->setVisitDay(new \Datetime('2018-12-12 12:00:00'));
        
       $form['command[email]'] = 'me@gmail.com';
        $form['command[visitDay]']->setValue(new \Datetime('2018-12-12 12:00:00'));
        $form['command[tycketsType]']->select('journée');

        $values = $form->getPhpValues();
        
        $birth = new \DateTime();
        $birth->setDate(1992, 3, 26);

       
        /*$values['command']['tickets'][0]['name'] = 'me';
        $values['command']['tickets'][0]['firstName'] = 'me';
        $values['command']['tickets'][0]['birthday'] = $birth->format('Y-m-d');
      

        $client->submit($form);

        $crawler = $client->followRedirect();

        $error = $crawler->filter('formErrors')->text();
        $this->assertSame("vous ne pouvez pas passer une commande vide", $error);
   
        
    }*/

}