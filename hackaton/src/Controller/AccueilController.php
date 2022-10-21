<?php

namespace App\Controller;

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
    public function hackathon(): Response
    {
        return $this->render('accueil/hackathon.html.twig', [
            'controller_name' => 'AccueilController',
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
}