<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Inscription;
use Doctrine\Persistence\ManagerRegistry;

class InscriptionHackathonController extends AbstractController
{
    #[Route('/inscriptionHackathon/{uc}', name: 'app_inscription_hackathon')]
    public function inscriptionHackathon(ManagerRegistry $doctrine, $uc): Response
    {
        if($uc == "POST") {
            $inscription = new Inscription();

            $idParticipant = $this->getUser()->getUserIdentifier();
            dump($idParticipant);
            // $inscription->setPARTICIPANT($idParticipant);

            $idHackhathon = $_POST['idHackhathon'];
            $inscription->setHACKATHON($idHackhathon);

            $dateInscription = $_POST['dateInscription'];
            $inscription->setDATEINSCRIPTION(new \DateTime($dateInscription));

            $description = $_POST['description'];
            $inscription->setDESCRIPTION($description);

            $entityManager=$doctrine->getManager();
            $entityManager->persist($inscription);
            $entityManager->flush();

            // return $this->render('inscription_hackathon/inscriptionHackathonConfirmation.html.twig', [
            //     'controller_name' => 'InscriptionHackathonController',
            // ]);
        }
        return $this->render('accueil/inscriptionhackathon.html.twig');
    }
}
