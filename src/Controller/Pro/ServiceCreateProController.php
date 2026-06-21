<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServiceCreateProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/services/create', name: 'app_service_create_pro', methods: ['GET'])]
        public function serviceCreatePro(): Response
        {
            return $this->render('pro/service_create.html.twig', [
                'page_title' => 'Créer une prestation — Belle Maison Pro',
            ]);
        }
}
