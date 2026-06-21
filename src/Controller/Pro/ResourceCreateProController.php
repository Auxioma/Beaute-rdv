<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ResourceCreateProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/resources/create', name: 'app_resource_create_pro', methods: ['GET'])]
        public function resourceCreatePro(): Response
        {
            return $this->render('pro/resource_create.html.twig', [
                'page_title' => 'Ajouter une ressource — Belle Maison Pro',
            ]);
        }
}
