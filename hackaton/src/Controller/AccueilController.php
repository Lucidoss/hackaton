<?php

namespace App\Controller;

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

    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        return $this->render('accueil/profile.html.twig');
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

    #[Route('/presentation', name: 'app_presentation')]
    public function presentation(): Response
    {
        return $this->render('accueil/presentation.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/inscriptionhackathon/{id}', name: 'app_inscriptionhackathon')]
    public function inscriptionhackathon(ManagerRegistry $doctrine, $id): Response
    {
        if($this->getUser() == NULL){
            $repository = $doctrine->getRepository(Hackathon::class);
            $hackathons = $repository->findBy(
            array(), // ou [] à la place des () sans array devant
            array('DATEDEBUT' => 'ASC')
          );

        return $this->render('accueil/hackathon.html.twig', [
            'lesHackathons' => $hackathons 
        ]);
        } else{
        $repository = $doctrine->getRepository(Hackathon::class);
        $leHackathon = $repository->find($id);
        return $this->render('accueil/inscriptionhackathon.html.twig', ['leHackathon' => $leHackathon]);
        }
    }

    #[Route('/detailhackathon/{id}', name: 'app_detailhackathon')]
    public function detailhackathon(ManagerRegistry $doctrine,$id): Response
    {
        $repository = $doctrine->getRepository(Hackathon::class);
        $leHackathon = $repository->find($id);
        return $this->render('accueil/detailhackathon.html.twig', ['leHackathon' => $leHackathon]);
    }

}
