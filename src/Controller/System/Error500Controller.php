<?php

namespace App\Controller\System;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class Error500Controller extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/500', name: 'app_error_500', methods: ['GET'])]
        public function error500(): Response
        {
            return $this->render('system/500.html.twig', [
                'page_title' => 'Erreur serveur — Belle Maison',
            ]);
        }
}
