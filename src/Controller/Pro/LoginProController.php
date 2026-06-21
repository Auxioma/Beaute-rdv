<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LoginProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/professionals/login', name: 'app_login_pro', methods: ['GET'])]
        public function loginPro(): Response
        {
            return $this->render('pro/login.html.twig', [
                'page_title' => 'Connexion professionnelle — Belle Maison',
            ]);
        }
}
