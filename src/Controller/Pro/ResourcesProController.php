<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ResourcesProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/resources', name: 'app_resources_pro', methods: ['GET'])]
        public function resourcesPro(): Response
        {
            return $this->render('pro/resources.html.twig', [
                'page_title' => 'Ressources physiques — Belle Maison Pro',
            ]);
        }
}
