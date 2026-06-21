<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class LoginProController extends AbstractController
{
   #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/professionals/login', name: 'app_login_pro', methods: ['GET', 'POST'])]
   public function loginPro(AuthenticationUtils $authenticationUtils): Response
   {
       return $this->render('pro/login.html.twig', [
           'page_title' => 'Connexion professionnelle — Belle Maison',
           'last_username' => $authenticationUtils->getLastUsername(),
           'error' => $authenticationUtils->getLastAuthenticationError(),
       ]);
   }
}
