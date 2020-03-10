<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;

class homeController extends AbstractController
{
  /**
  *@route("/", name="Home")
  */
  public function home (Request $request, LoggerInterface $logger)
  {
    $etatDebug = $this->getParameter('app.afficheDebug');

    $qqch = 1;
    $logger->info('Accès à l\'application');
    if ($etatDebug) {
       $errCode = 100;
       $errMsg = 'This is an error';
       
       $request->attributes->set('errMsg',$errMsg);
       
      return $this->redirectToRoute('Error',[
        'errCode' => $errCode,
        ]);
    }
    elseif (is_numeric($qqch)) {
      $number = random_int(0,100);
      return $this->render('front_pages/acceuil.html.twig',[
        'qqch' => $qqch,
        'number' => $number
        ]);  
    }
    
  }
}