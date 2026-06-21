<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserDeleteAccountController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/delete', name: 'app_user_delete_account', methods: ['GET'])]
        public function userDeleteAccount(): Response
        {
            return $this->render('account/delete_account.html.twig', [
                'page_title' => 'Supprimer mon compte — Belle Maison',
            ]);
        }
}
