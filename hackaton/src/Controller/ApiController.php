<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Hackathon;
use App\Entity\Atelier;
use App\Entity\ParticipantAtelier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends AbstractController
{
    #[Route('/api/hackathons', name: 'app_api_hackathons', methods: ['GET'])]
    public function getListeHackathons(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Hackathon::class);
        $lesHackathons = $repository->findBy(
            array(),
            array('DATEDEBUT' => 'ASC')
          );
        $tableau= [];
        foreach($lesHackathons as $unHackathon) {
            $tableau[]=[
                'id'=>$unHackathon->getId(),
                'dateDebut'=>$unHackathon->getDATEDEBUT(),
                'dateFin'=>$unHackathon->getDATEFIN(),
                'heureDebut'=>$unHackathon->getHEUREDEBUT(),
                'heureFin'=>$unHackathon->getHEUREFIN(),
                'lieu'=>$unHackathon->getLIEU(),
                'rue'=>$unHackathon->getRUE(),
                'ville'=>$unHackathon->getVILLE(),
                'cp'=>$unHackathon->getCP(),
                'theme'=>$unHackathon->getTHEME(),
                'description'=>$unHackathon->getDESCRIPTION(),
                'image'=>$unHackathon->getIMAGE(),
                'dateLimite'=>$unHackathon->getDATELIMITE(),
                'nbPlaces'=>$unHackathon->getNBPLACES(),
            ];
        }
        return new JsonResponse($tableau, 200, ['Access-Control-Allow-Origin' => '*']);
    }

    // #[Route('/api/hackathons/{id}', name: 'app_api_hackathon_id', methods: ['GET'])]
    // public function getLeHackathon(ManagerRegistry $doctrine, $id): Response
    // {
    //     $repository = $doctrine->getRepository(Hackathon::class);
    //     $leHackathon = $repository->find($id);
    //     if ($leHackathon !== null) {
    //         $tableau = [
    //             'id'=>$leHackathon->getId(),
    //             'dateDebut'=>$leHackathon->getDATEDEBUT(),
    //             'dateFin'=>$leHackathon->getDATEFIN(),
    //             'heureDebut'=>$leHackathon->getHEUREDEBUT(),
    //             'heureFin'=>$leHackathon->getHEUREFIN(),
    //             'lieu'=>$leHackathon->getLIEU(),
    //             'rue'=>$leHackathon->getRUE(),
    //             'ville'=>$leHackathon->getVILLE(),
    //             'cp'=>$leHackathon->getCP(),
    //             'theme'=>$leHackathon->getTHEME(),
    //             'description'=>$leHackathon->getDESCRIPTION(),
    //             'image'=>$leHackathon->getIMAGE(),
    //             'dateLimite'=>$leHackathon->getDATELIMITE(),
    //             'nbPlaces'=>$leHackathon->getNBPLACES(),
    //         ];
    //         return new JsonResponse($tableau);
    //     } else {
    //         return new JsonResponse(['message' => 'Hackathon not found'], Response::HTTP_NOT_FOUND);
    //     }
    // }

    #[Route('/api/ateliers', name: 'app_api_ateliers', methods: ['GET'])]
    public function getListeAteliers(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Atelier::class);
        $lesAteliers = $repository->findBy(
            array(),
            array('DATEDEBUT' => 'ASC')
          );
        $tableau= [];
        foreach($lesAteliers as $unAtelier) {
            $tableau[]=[
                'id'=>$unAtelier->getId(),
                'nbPlaces'=>$unAtelier->getNBPARTICIPANTS(),
                'nomEvenement'=>$unAtelier->getNOMEVENEMENT(),
                'dateDebut'=>$unAtelier->getDATEDEBUT(),
                'dateFin'=>$unAtelier->getDATEFIN(),
                'duree'=>$unAtelier->getDUREE()
            ];
        }
        return new JsonResponse($tableau);
    }

    #[Route('/api/hackathons/{idHackathon}/ateliers', name: 'app_api_ateliers_by_hackathon', methods: ['GET'])]
    public function getListeAteliersByHackathon(ManagerRegistry $doctrine, $idHackathon): Response
    {
        $repositoryAtelier = $doctrine->getRepository(Atelier::class);

        $repositoryHackathon = $doctrine->getRepository(Hackathon::class);
        $leHackathon = $repositoryHackathon->find($idHackathon);

        $lesAteliers = $repositoryAtelier->findBy(array('HACKATHON' => $idHackathon));

        if ($leHackathon !== null) {
            $tableau= [];
            foreach($lesAteliers as $unAtelier) {
                $tableau[]=[
                    'id'=>$unAtelier->getId(),
                    'nbPlaces'=>$unAtelier->getNBPARTICIPANTS(),
                    'nomEvenement'=>$unAtelier->getNOMEVENEMENT(),
                    'dateDebut'=>$unAtelier->getDATEDEBUT(),
                    'dateFin'=>$unAtelier->getDATEFIN(),
                    'duree'=>$unAtelier->getDUREE()
                ];
            }
            return new JsonResponse($tableau);
        } else {
            return new JsonResponse(['message' => 'Hackathon not found'], Response::HTTP_NOT_FOUND);
        }
    }

    #[Route('/api/atelier/{idAtelier}', name: 'app_api_add_inscription_atelier', methods: ['POST'])]
    public function addInscriptionAtelier(ManagerRegistry $doctrine, $idAtelier, Request $request): Response
    {
        $json = json_decode($request->getContent(), true);
        dump($json);
        $repositoryAtelier = $doctrine->getRepository(Atelier::class);
        $leAtelier = $repositoryAtelier->find($idAtelier);

        $participantAtelier = new ParticipantAtelier();

        if ($leAtelier !== null) {
            $participantAtelier->setNOM($json['nom']);
            $participantAtelier->setPRENOM($json['prenom']);
            $participantAtelier->setEMAIL($json['email']);
            $participantAtelier->setIDATELIER($leAtelier);

            $d = $doctrine->getManager();
            $d->persist($participantAtelier);
            $d->flush();

            return new JsonResponse(['message' => 'Atelier created'], Response::HTTP_CREATED);
        } else {
            return new JsonResponse(['message' => 'Atelier not found'], Response::HTTP_NOT_FOUND);
        }
    }
}
