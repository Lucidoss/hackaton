<?php

namespace App\Controller;

use App\Service\PdoHackathons;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


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
    public function hackathon(PdoHackathons $PdoHackathons): Response
    {
        $lesHackathons = $PdoHackathons->getHackathons();
        dump($lesHackathons);
        return $this->render('accueil/hackathon.html.twig', [
            'lesHackathons' => $lesHackathons
        ]);
    }

    #[Route('/connexion', name: 'app_connexion')]
    public function connexion(): Response
    {
        return $this->render('accueil/connexion.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/inscription', name: 'app_inscription')]
    public function inscription(): Response
    {
        return $this->render('accueil/inscription.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/deconnexion', name: 'app_deconnexion')]
    public function deconnexion(): Response
    {
        return $this->render('accueil/deconnexion.html.twig', [
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
