<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CookiesController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/cookies', name: 'app_cookies', methods: ['GET'])]
        public function cookies(): Response
        {
            return $this->render('public/cookies.html.twig', [
                'page_title' => 'Politique cookies — Belle Maison',
            ]);
        }
}
