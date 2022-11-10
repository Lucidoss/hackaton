<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PdoHackathons;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/hackathon', name: 'app_hackathon')]
    public function hackathon(): Response
    {
        return $this->render('accueil/hackathon.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/connexion', name: 'app_connexion')]
    public function connexion(PdoHackathons $pdoHackathons): Response
    {
        $login = 'sbeauchene';
        $mdp = 'mdp';

        $user = $pdoHackathons->connecter($login, $mdp);

        if($user > 1) {
            $connexion = 'Connexion réussie';
            dump('OK');
        } else {
            $connexion = 'Connexion échoué';
            dump('PAS OK');
        }

        return $this->render('accueil/connexion.html.twig', [
            'connexion' => $connexion,
        ]);
    }

    #[Route('/inscription', name: 'app_inscription')]
    public function inscription(): Response
    {
        return $this->render('accueil/inscription.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/presentation', name: 'app_presentation')]
    public function presentation(): Response
    {
        return $this->render('accueil/presentation.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/inscriptionhackathon', name: 'app_inscriptionhackathon')]
    public function inscriptionhackathon(): Response
    {
        return $this->render('accueil/inscriptionhackathon.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
