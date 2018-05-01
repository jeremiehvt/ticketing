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

}