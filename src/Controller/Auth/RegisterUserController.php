<?php

namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RegisterUserController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/register', name: 'app_register_user', methods: ['GET'])]
        public function registerUser(): Response
        {
            return $this->render('auth/register_user.html.twig', [
                'page_title' => 'Créer un compte client — Belle Maison',
            ]);
        }
}
