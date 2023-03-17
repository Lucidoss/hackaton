<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Hackathon;
use App\Entity\Participant;
use App\Entity\Inscription;
use Symfony\Component\HttpFoundation\JsonResponse;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        $user = "";
        if($this->getUser() != null) {
            $user = $this->getUser()->getUserIdentifier();
        }

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController', 'user'=> $user
        ]);
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(ManagerRegistry $doctrine): Response
    {
        $user = $this->getUser();

        $repoInscription = $doctrine->getRepository(Inscription::class);

        $userId = $user->getId();
        $mesInscriptions = $repoInscription->findBy(array('PARTICIPANT' => $userId));

        return $this->render('accueil/profile.html.twig', [
            'leProfil' => $user,
            'lesInscriptions' => $mesInscriptions
        ]);
    }

    #[Route('/hackathon', name: 'app_hackathon')]
    public function hackathon(ManagerRegistry $doctrine/*, $idHackathon*/): Response
    {
        $repoHackathon = $doctrine->getRepository(Hackathon::class);
        $hackathons = $repoHackathon->findBy(
            array(), // ou [] à la place des () sans array devant
            array('DATEDEBUT' => 'ASC')
        );

        // $repoInscription = $doctrine->getRepository(Inscription::class);
        // $em = $this->getEntityManager();
        // $query = $em->createQuery("SELECT count(*) as nombreInscription FROM `inscription` WHERE IDHACKATHON = 2;");

        // $nombreInscription = $query->getSingleScalarResult();
        
            

        //  SELECT count(*) as nombreInscription FROM `inscription` WHERE IDHACKATHON = 2;

        return $this->render('accueil/hackathon.html.twig', [
            'lesHackathons' => $hackathons,
            // 'nombreInscription' => $nombreInscription
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
