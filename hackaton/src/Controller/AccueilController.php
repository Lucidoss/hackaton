<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Participant;

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

    #[Route('/connexion/{uc}', name: 'app_connexion')]
    public function connexion(ManagerRegistry $doctrine, $uc): Response
    {
        if($uc == "POST") {
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];
            $repository = $doctrine->getRepository(Participant::class);
            $user = $repository->findOneBy([ 
            'LOGIN' => $login, 
            'MDP' => $mdp, 
            ]);
           
            if($user != null) {
                $connexion = 'Connexion réussie';
                dump($connexion);
            } else {
                $connexion = 'Connexion échoué';
                dump($connexion);
            }
        }

        return $this->render('accueil/connexion.html.twig');
    }

    #[Route('/inscription/{uc}', name: 'app_inscription')]
    public function inscription(ManagerRegistry $doctrine, $uc): Response
    {
        if($uc == "POST") {
            $participant = new Participant();
            $nom = $_POST['nom'];

            $participant->setNOM($nom);
            $prenom = $_POST['prenom'];

            $participant->setPRENOM($prenom);
            $dateNaissance = $_POST['dateNaissance'];

            $participant->setDATENAISSANCE(new \DateTime($dateNaissance));
            $ville = $_POST['ville'];

            $participant->setVILLE($ville);
            $rue = $_POST['rue'];

            $participant->setRUE($rue);
            $cp = $_POST['cp'];

            $participant->setCP($cp);
            $email = $_POST['email'];

            $participant->setEMAIL($email);
            $mdp = $_POST['mdp'];
            
            $participant->setMDP($mdp);
            $participant->setLOGIN(strtolower($prenom[0] . $nom));

            $entityManager=$doctrine->getManager();
            $entityManager->persist($participant);
            $entityManager->flush();
        }
            return $this->render('accueil/inscription.html.twig');
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
