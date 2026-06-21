<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserFavoritesController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/favorites', name: 'app_user_favorites', methods: ['GET'])]
        public function userFavorites(): Response
        {
            return $this->render('account/favorites.html.twig', [
                'page_title' => 'Mes favoris — Belle Maison',
            ]);
        }
}
