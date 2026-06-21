<?php

namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ForgotPasswordUserController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/password/forgot', name: 'app_forgot_password_user', methods: ['GET'])]
        public function forgotPasswordUser(): Response
        {
            return $this->render('auth/forgot_password_user.html.twig', [
                'page_title' => 'Mot de passe oublié — Belle Maison',
            ]);
        }
}
