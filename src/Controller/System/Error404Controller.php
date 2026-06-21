<?php

namespace App\Controller\System;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class Error404Controller extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/404', name: 'app_error_404', methods: ['GET'])]
        public function error404(): Response
        {
            return $this->render('system/404.html.twig', [
                'page_title' => 'Page introuvable — Belle Maison',
            ]);
        }
}
