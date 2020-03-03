<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class homeController extends AbstractController
{
  /**
  *@route("/{qqch}")
  */
  public function home ($qqch)
  {
    $number = random_int(0,100);
      return $this->render('front_pages/acceuil.html.twig',[
        'qqch' => $qqch,
        'number' => $number
        ]);
  }
}