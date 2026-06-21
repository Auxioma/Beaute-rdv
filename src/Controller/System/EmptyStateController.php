<?php

namespace App\Controller\System;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmptyStateController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/states/empty', name: 'app_empty_state', methods: ['GET'])]
        public function emptyState(): Response
        {
            return $this->render('system/empty_state.html.twig', [
                'page_title' => 'Aucune donnée — Belle Maison',
            ]);
        }
}
