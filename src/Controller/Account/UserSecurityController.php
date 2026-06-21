<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserSecurityController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/security', name: 'app_user_security', methods: ['GET'])]
        public function userSecurity(): Response
        {
            return $this->render('account/security.html.twig', [
                'page_title' => 'Sécurité — Belle Maison',
            ]);
        }
}
