<?php

namespace App\Controller\System;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class Error403Controller extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/403', name: 'app_error_403', methods: ['GET'])]
        public function error403(): Response
        {
            return $this->render('system/403.html.twig', [
                'page_title' => 'Accès refusé — Belle Maison',
            ]);
        }
}
