<?php

namespace App\Controller\ViewController;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Command;
use App\Repository\CommandRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class RecapController extends Controller
{
    /**
     * @Route("/recapitulatif-commande-{command_id}", name="recap")
     * @ParamConverter("command", options={"mapping":{"command_id": "token"}})
     */
    public function recapShow(Request $request, Command $command)
    {
    	if ($command->getPaid() === false) {

    		return $this->render('recap/recap.html.twig', array('command'=>$command));
    		
    	} else {

    		return $this->redirectToRoute('homepage');
    	}
        
    }
}
