<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Inscription;
use App\Entity\Hackathon;
use Doctrine\Persistence\ManagerRegistry;

class InscriptionHackathonController extends AbstractController
{
    #[Route('/inscriptionHackathon/{id}', name: 'app_inscription_hackathon')]
    public function inscriptionHackathon(ManagerRegistry $doctrine, $id): Response
    {
        if(isset($_POST['submit'])) {
            $inscription = new Inscription();

            $participant = $this->getUser();
            $inscription->setPARTICIPANTS($participant);

            $hackhathon = $doctrine->getRepository(Hackathon::class)->find($id);
            $inscription->setHACKATHONS($hackhathon);

            $time = new \DateTime();
            $time = date('d-m-Y');
            $dateInscription = $time;
            $inscription->setDATEINSCRIPTION(new \DateTime($dateInscription));

            $competences = $_POST['competences'];
            $inscription->setDESCRIPTION($competences);

            $entityManager=$doctrine->getManager();
            $entityManager->persist($inscription);
            $entityManager->flush();

            return $this->render('inscription_hackathon/inscriptionHackathonConfirmation.html.twig');
        }
    }
}
