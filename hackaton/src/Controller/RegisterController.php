<?php

namespace App\Controller;

use App\Entity\Inscription;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Participant;

class RegisterController extends AbstractController
{
    #[Route('/inscription/{uc}', name: 'app_inscription')]
    public function inscription(ManagerRegistry $doctrine, $uc): Response
    {
        if($uc == "POST") {
            $participant = new Participant();

            $nom = $_POST['nom'];
            $participant->setNOM($nom);

            $prenom = $_POST['prenom'];
            $participant->setPRENOM($prenom);

            $login = $_POST['login'];
            $leLogin = $login;
            $participant->setLOGIN($login);

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
            $participant->setMDP(password_hash($mdp, PASSWORD_BCRYPT));

            $portfolio = $_POST['portfolio'];
            $participant->setPORTFOLIO($portfolio);
            
            $repoFavoris = $doctrine->getRepository(Participant::class);
            $loginExiste = $repoFavoris->findby(array('LOGIN' => $login));

            if(!$loginExiste){
                $entityManager=$doctrine->getManager();
                $entityManager->persist($participant);
                $entityManager->flush();

                return $this->render('accueil/connexion.html.twig');
            }

            return $this->render('accueil/inscription.html.twig', [
                'erreur' =>  "le login " . $leLogin . " est déjà pris",
            ]);

        }
        return $this->render('accueil/inscription.html.twig', [
            'erreur' => "",
        ]);
    }
}
