<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccountUserController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account', name: 'app_account_user', methods: ['GET'])]
        public function accountUser(): Response
        {
            return $this->render('account/account.html.twig', [
                'page_title' => 'Accueil client — Belle Maison',
            ]);
        }
}
