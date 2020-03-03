<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    /**
     * @Route("/error", name="error")
     */
    public function index()
    {

        set_error_handler(function($niveau, $message, $fichier, $ligne){
            echo 'Erreur : ' .$message. '<br>';
            echo 'Niveau de l\'erreur : ' .$niveau. '<br>';
            echo 'Erreur dans le fichier : ' .$fichier. '<br>';
            echo 'Emplacement de l\'erreur : ' .$ligne. '<br>';
        });

        return $this->render('error/index.html.twig', [
            'controller_name' => 'ErrorController',
        ]);
    }
}
