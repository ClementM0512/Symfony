<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

class ErrorController extends AbstractController
{
    /**
     * @Route("/error/{errCode}", name="Error")
     */
    public function Error(Request $request, LoggerInterface $logger, $errCode)
    {
        // $logger->info('Récupération du logger');
    	// $logger->error("Une erreur ".$errCode." s'est produite dans l'application");
        // dd($request->query->get('errMsg'));

        $errMsg = $request->query->get('errMsg');
        return $this->render('error/error.html.twig', [
            'errCode' => $errCode,
            'errMsg' => $errMsg
        ]);
    }
}
