<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class homeController
{
  /**
  *@route("/{qqch}")
  */
  public function home ($qqch)
  {
    $number = ramdom_int(0,100);
      return new Response('<html><body>accueil; vous proposer' .$qqch.'et le nombre est '.$number.'</body></html>');
  }
}