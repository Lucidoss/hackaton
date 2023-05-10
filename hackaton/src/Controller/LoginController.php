<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/connexion', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response {
        // get the login error if there is one
        $errors = $authenticationUtils->getLastAuthenticationError();
        $lastUsername=$authenticationUtils->getLastUsername();

        return $this->render('accueil/connexion.html.twig', [
            'lastUsername'=>$lastUsername, 'errors'=>$errors
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout() {}

    #[Route('/deconnexion', name: 'app_deconnexion')]
    public function deconnexion(): Response
    {
        return $this->render('accueil/deconnexion.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
