<?php

namespace App\Tests\Controller\ViewController;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class HomepageControllerTest extends WebTestCase
{

	/**
     * @dataProvider urlProvider
     */
    public function testUrl($url)
    {

    	$client = self::createClient();
        $crawler = $client->request('GET', $url);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());     
    }

    public function urlProvider()
    {
        yield ['/'];
        yield ['/billetterie'];
        yield ['/#contact'];
        yield ['/billetterie#contact'];
        
    }

    public function testLink()
    {
    	$client = self::createClient();
	    $crawler = $client->request('GET', '/');

        $ticketLink = $crawler->selectLink('billetterie')->link();
        $crawler = $client->click($ticketLink);

        $info = $crawler->filter('h2')->text();
        $this->assertSame("formulaire ", $info);
    }

}