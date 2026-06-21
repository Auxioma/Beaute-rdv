<?php

namespace App\Controller\System;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class OfflineController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/offline', name: 'app_offline', methods: ['GET'])]
        public function offline(): Response
        {
            return $this->render('system/offline.html.twig', [
                'page_title' => 'Hors connexion — Belle Maison',
            ]);
        }
}
