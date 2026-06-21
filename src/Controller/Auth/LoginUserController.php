<?php

namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class LoginUserController extends AbstractController
{
   #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/login', name: 'app_login_user', methods: ['GET', 'POST'])]
   public function loginUser(AuthenticationUtils $authenticationUtils): Response
   {
       return $this->render('auth/login_user.html.twig', [
           'page_title' => 'Connexion client — Belle Maison',
           'last_username' => $authenticationUtils->getLastUsername(),
           'error' => $authenticationUtils->getLastAuthenticationError(),
       ]);
   }
}
