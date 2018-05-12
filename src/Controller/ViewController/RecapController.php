<?php

namespace App\Controller\ViewController;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Command;
use App\Repository\CommandRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class RecapController extends AbstractController
{
    /**
     * @Route("/recapitulatif-commande-{command_id}", name="recap", requirements={"command_id"="\w+"})
     * @ParamConverter("command", options={"mapping":{"command_id": "token"}})
     * @Method({"GET"})
     */
    public function recapShow(Request $request, Command $command)
    {
    	if ($command->getPaid() === false) {

    		return $this->render('recap/recap.html.twig', array('command'=>$command));
    		
    	} else {

    		throw new AccessDeniedException("vous avez déjà payé votre commande");
            
    	}
        
    }
}
