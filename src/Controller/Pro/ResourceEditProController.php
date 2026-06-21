<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ResourceEditProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/resources/demo/edit', name: 'app_resource_edit_pro', methods: ['GET'])]
        public function resourceEditPro(): Response
        {
            return $this->render('pro/resource_edit.html.twig', [
                'page_title' => 'Modifier une ressource — Belle Maison Pro',
            ]);
        }
}
