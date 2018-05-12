<?php
namespace App\Controller\ViewController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class HomepageController extends AbstractController
{
    /**
    * @Route("/", name="homepage")
    * @Method({"GET"})
    */
    public function number() {

        return $this->render('homepage/homepage.html.twig');
    }
}

