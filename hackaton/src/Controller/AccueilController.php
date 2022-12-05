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
