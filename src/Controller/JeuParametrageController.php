<?php
// src/Controller/JeuParametrageController.php.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class JeuParametrageController extends AbstractController
{
    /**
	* @Route("/jeu/parametrage", name="JeuParametrage")
    */
    public function parametrage(Request $request, LoggerInterface $logger, SessionInterface $session)
    {
        
        $logger->info('Le jeu est en cours de paramétrisation');
        
        // Récupérer la session et l'utilisateur'
        if($request->get('qui') !== null)
        {
            $qui = $request->get('qui');
            $age = $request->get('age');
            $datNai = $request->get('datNai');
            // Gestion des erreurs
            if($qui == 'Prénom' || $qui =='')
            {
                $errCode = 101;
                $errMess = "Le prenom ne peut pas être vide ni égal à 'Prénom'";
                # Ajout d'un param à la requête
                $request->attributes->set('errMess', $errMess);

                # GenerateUrl > générer une URL à partir d'une route
                # Redirect > rediriger vers une page externe
                return $this->redirectToRoute('GestionErreur', [
                    'errCode' => $errCode,
                    //'errMess' => $errMess,
                ]);
            } elseif(strlen($qui) <= 3) {
                $errCode = 101;
                $errMess = "Le prenom doit avoir plus de 3 caractères";
                # Ajout d'un param à la requête
                $request->attributes->set('errMess', $errMess);

                # GenerateUrl > générer une URL à partir d'une route
                # Redirect > rediriger vers une page externe
                return $this->redirectToRoute('GestionErreur', [
                    'errCode' => $errCode,
                    //'errMess' => $errMess,
                ]);
            } else {
                //var_dump($qui);
                
                // Sauvegarde du prenom en session
                $session->set('qui', $qui);
                $session->set('age', $age);
                $session->set('datNai', $datNai);
                // Génération d'un code aléatoire
                $random = random_int(1, 1000000000);
                $session->set('id_visiteur', $random);
                
                var_dump($random);

                return $this->redirectToRoute('JeuTour', [
                    'nbr_tour' => 0
                ]);
            }
        } else {
            return $this->render('front_pages/jeuParametrage.html.twig', [
                #'number' => $number,
            ]);
        }

        
        
    }
}