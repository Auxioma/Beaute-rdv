<?php

namespace App\Controller\System;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LoadingStateController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/states/loading', name: 'app_loading_state', methods: ['GET'])]
        public function loadingState(): Response
        {
            return $this->render('system/loading_state.html.twig', [
                'page_title' => 'Chargement — Belle Maison',
            ]);
        }
}
