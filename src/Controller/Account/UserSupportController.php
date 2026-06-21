<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserSupportController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/support', name: 'app_user_support', methods: ['GET'])]
        public function userSupport(): Response
        {
            return $this->render('account/support.html.twig', [
                'page_title' => 'Support client — Belle Maison',
            ]);
        }
}
