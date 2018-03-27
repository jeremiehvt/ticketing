<?php
namespace App\Controller\ViewController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{
    /**
    * @Route("/", name="homepage")
    */
    public function number() {

        return $this->render('homepage/homepage.html.twig');
    }
}

