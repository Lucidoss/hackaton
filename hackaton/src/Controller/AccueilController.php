<?php

namespace App\Controller;

use App\Service\PdoHackathons;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Hackathon;


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
    public function hackathon(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Hackathon::class);
        $hackathons = $repository->findBy(
            array(), // ou [] à la place des () sans array devant
            array('DATEDEBUT' => 'ASC')
          );

        return $this->render('accueil/hackathon.html.twig', [
            'lesHackathons' => $hackathons 
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

    #[Route('/inscriptionhackathon/{id}', name: 'app_inscriptionhackathon')]
    public function inscriptionhackathon(ManagerRegistry $doctrine,$id): Response
    {
        $repository = $doctrine->getRepository(Hackathon::class);
        $leHackathon = $repository->find($id);
        return $this->render('accueil/inscriptionhackathon.html.twig', ['leHackathon' => $leHackathon]);
    }

    #[Route('/detailhackathon/{id}', name: 'app_detailhackathon')]
    public function detailhackathon(ManagerRegistry $doctrine,$id): Response
    {
        $repository = $doctrine->getRepository(Hackathon::class);
        $leHackathon = $repository->find($id);
        return $this->render('accueil/detailhackathon.html.twig', ['leHackathon' => $leHackathon]);
    }

}
