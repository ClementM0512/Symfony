<?php
// src/Controller/JeuTourController.php.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class JeuTourController extends AbstractController
{
    /**
	* @Route("/jeu/tour/{nbr_tour}", name="JeuTour")
    */
    public function parametrage(Request $request, LoggerInterface $logger, $nbr_tour)
    {
        
        //$logger->info('Le jeu a commencé pour '.$qui.' au tour n°'.$nbr_tour);
        
        // Récupérer la session et la commencer

        // Appeler l'API avec sa fonction de génération de coupable aléatoire

        // Récupérer les mots-clefs possibles depuis l'API

        // Offrir la possibilité dans un champ texte de saisir les mots-clefs d'une question

        // Valider la saisie et controller la réponse

        $number = random_int(0, 100);
        return $this->render('front_pages/jeuTour.html.twig', [
            'number' => $number,
        ]);
        
    }
}