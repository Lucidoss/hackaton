<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Hackathon;
use App\Entity\Participant;
use App\Entity\Inscription;
use App\Entity\Favoris;
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

    #[Route('/profil', name: 'app_profil')]
    public function profil(ManagerRegistry $doctrine): Response
    {
        $user = $this->getUser();

        $repoInscription = $doctrine->getRepository(Inscription::class);

        $userId = $user->getId();
        $mesInscriptions = $repoInscription->findBy(array('PARTICIPANTS' => $userId));

        return $this->render('accueil/profil.html.twig', [
            'leProfil' => $user,
            'lesInscriptions' => $mesInscriptions
        ]);
    }

    #[Route('/hackathon', name: 'app_hackathon')]
    public function hackathon(ManagerRegistry $doctrine): Response
    {
        $repoHackathon = $doctrine->getRepository(Hackathon::class);
        $hackathons = $repoHackathon->findBy(
            array(), // ou [] à la place des () sans array devant
            array('DATEDEBUT' => 'ASC')
        );

        $repoFavoris = $doctrine->getRepository(Favoris::class);
        $favoris = $repoFavoris->findAll();

        $repoInscriptions = $doctrine->getRepository(Inscription::class);
        $mesInscriptions = null;
        $userId = null;

        if($this->getUser()){
            $userId = $this->getUser()->getId();
            $mesInscriptions = $repoInscriptions->findBy(array('PARTICIPANTS' => $userId));
        }

        return $this->render('accueil/hackathon.html.twig', [
            'lesHackathons' => $hackathons,
            'lesFavoris' => $favoris,
            'utilId' => $userId,
            'lesInscriptions' => $mesInscriptions,
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
        }
        else
        {
            $userId = $this->getUser()->getId();
            $repoInscription = $doctrine->getRepository(Inscription::class);
            $estInscrit = $repoInscription->findBy(array('HACKATHONS' => $id, 'PARTICIPANTS' => $userId));

            $repository = $doctrine->getRepository(Hackathon::class);
            $leHackathon = $repository->find($id);

            if($estInscrit)
            {
                return $this->render('accueil/echecInscriptionHackathon.html.twig', [
                    'leHackathon' => $leHackathon,
                ]);
            }

            $placesRestantes = $leHackathon->getNBPLACES()-1;
            $leHackathon->setNBPLACESRESTANTES($placesRestantes);

            $entityManager=$doctrine->getManager();
            $entityManager->persist($leHackathon);
            $entityManager->flush();

            return $this->render('accueil/inscriptionhackathon.html.twig', [
                'leHackathon' => $leHackathon
            ]);
        }
    }

    #[Route('/detailhackathon/{id}', name: 'app_detailhackathon')]
    public function detailhackathon(ManagerRegistry $doctrine,$id): Response
    {
        $repository = $doctrine->getRepository(Hackathon::class);
        $leHackathon = $repository->find($id);

        $repoInscriptions = $doctrine->getRepository(Inscription::class);

        $mesInscriptions = null;
        $userId = null;

        if($this->getUser()){
            $userId = $this->getUser()->getId();
            $mesInscriptions = $repoInscriptions->findBy(array('PARTICIPANTS' => $userId));
        }

        return $this->render('accueil/detailhackathon.html.twig', [
            'leHackathon' => $leHackathon,
            'lesInscriptions' => $mesInscriptions,

        ]);
    }

    #[Route('/favoris', name: 'app_favoris')]
    public function favorisHackathon(ManagerRegistry $doctrine): Response
    {
        $user = $this->getUser();
        $userId = $user->getId();
        $repoFavoris = $doctrine->getRepository(Favoris::class);

        $mesFavoris = $repoFavoris->findBy(array('PARTICIPANTS' => $userId));

        $tableau= [];
            foreach($mesFavoris as $unFavoris) {
                $tableau[]=[
                    'IDFAVORIS'=>$unFavoris->getIDFAVORIS(),
                    'IDHACKATHON'=>$unFavoris->getHACKATHONS()->getID(),
                    'DATEDEBUT'=>$unFavoris->getHACKATHONS()->getDATEDEBUT(),
                    'DATEFIN'=>$unFavoris->getHACKATHONS()->getDATEFIN(),
                    'HEUREDEBUT'=>$unFavoris->getHACKATHONS()->getHEUREDEBUT(),
                    'HEUREFIN'=>$unFavoris->getHACKATHONS()->getHEUREFIN(),
                    'LIEU'=>$unFavoris->getHACKATHONS()->getLIEU(),
                    'RUE'=>$unFavoris->getHACKATHONS()->getRUE(),
                    'VILLE'=>$unFavoris->getHACKATHONS()->getVILLE(),
                    'CP'=>$unFavoris->getHACKATHONS()->getCP(),
                    'THEME'=>$unFavoris->getHACKATHONS()->getTHEME(),
                    'DESCRIPTION'=>$unFavoris->getHACKATHONS()->getDESCRIPTION(),
                    'IMAGE'=>$unFavoris->getHACKATHONS()->getIMAGE(),
                    'DATELIMITE'=>$unFavoris->getHACKATHONS()->getDATELIMITE(),
                    'NBPLACES'=>$unFavoris->getHACKATHONS()->getNBPLACES(),
                ];
            }

        return $this->render('accueil/favoris.html.twig', [
            'lesHackathons' => $tableau,
        ]);
    }

    #[Route('/confirmationfavoris/{id}', name: 'app_confirmation_favoris')]
    public function ajoutFavoris(ManagerRegistry $doctrine, $id): Response
    {
            $repoFavoris = $doctrine->getRepository(Favoris::class);
            $leHackathon = $repoFavoris->find($id);



            $userId = $this->getUser()->getId();
            $estFavoris = $repoFavoris->findBy(array('HACKATHONS' => $id, 'PARTICIPANTS' => $userId));

            $repository = $doctrine->getRepository(Hackathon::class);
            $hackathon = $repository->find($id);

            if($estFavoris)
            {
                return $this->render('accueil/echecAjoutFavorisHackathon.html.twig', [
                    'leHackathon' => $hackathon,
                ]);
            }

            if(!$leHackathon)
            {
                $favoris = new Favoris();
                $participant = $this->getUser();
                $favoris->setPARTICIPANTS($participant);
                $hackhathon = $doctrine->getRepository(Hackathon::class)->find($id);
                $favoris->setHACKATHONS($hackhathon);
                $entityManager=$doctrine->getManager();
                $entityManager->persist($favoris);
                $entityManager->flush();
                return $this->render('accueil/confirmationHackathonFavoris.html.twig');
            }
        }

    #[Route('/suppressionfavoris/{id}', name: 'app_suppression_favoris')]
    public function suppressionFavoris(ManagerRegistry $doctrine, $id): Response
    {
        $repoFavoris = $doctrine->getRepository(Favoris::class);
        $leHackathon = $repoFavoris->find($id);

        if(!$leHackathon){
            $user = $this->getUser();
        $userId = $user->getId();
        // $repoFavoris = $doctrine->getRepository(Favoris::class);

        $mesFavoris = $repoFavoris->findBy(array('PARTICIPANTS' => $userId));

        $tableau= [];
            foreach($mesFavoris as $unFavoris) {
                $tableau[]=[
                    'IDFAVORIS'=>$unFavoris->getIDFAVORIS(),
                    'IDHACKATHON'=>$unFavoris->getHACKATHONS()->getID(),
                    'DATEDEBUT'=>$unFavoris->getHACKATHONS()->getDATEDEBUT(),
                    'DATEFIN'=>$unFavoris->getHACKATHONS()->getDATEFIN(),
                    'HEUREDEBUT'=>$unFavoris->getHACKATHONS()->getHEUREDEBUT(),
                    'HEUREFIN'=>$unFavoris->getHACKATHONS()->getHEUREFIN(),
                    'LIEU'=>$unFavoris->getHACKATHONS()->getLIEU(),
                    'RUE'=>$unFavoris->getHACKATHONS()->getRUE(),
                    'VILLE'=>$unFavoris->getHACKATHONS()->getVILLE(),
                    'CP'=>$unFavoris->getHACKATHONS()->getCP(),
                    'THEME'=>$unFavoris->getHACKATHONS()->getTHEME(),
                    'DESCRIPTION'=>$unFavoris->getHACKATHONS()->getDESCRIPTION(),
                    'IMAGE'=>$unFavoris->getHACKATHONS()->getIMAGE(),
                    'DATELIMITE'=>$unFavoris->getHACKATHONS()->getDATELIMITE(),
                    'NBPLACES'=>$unFavoris->getHACKATHONS()->getNBPLACES(),
                ];
            }

        return $this->render('accueil/favoris.html.twig', [
            'lesHackathons' => $tableau,
        ]);
        }

        $entityManager=$doctrine->getManager();
        $entityManager->remove($leHackathon);
        $entityManager->flush();

        return $this->render('accueil/confirmationSuppressionFavoris.html.twig');
    }
}
