<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserLoyaltyController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/loyalty', name: 'app_user_loyalty', methods: ['GET'])]
        public function userLoyalty(): Response
        {
            return $this->render('account/loyalty.html.twig', [
                'page_title' => 'Fidélité — Belle Maison',
            ]);
        }
}
