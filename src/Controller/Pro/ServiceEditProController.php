<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServiceEditProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/services/demo/edit', name: 'app_service_edit_pro', methods: ['GET'])]
        public function serviceEditPro(): Response
        {
            return $this->render('pro/service_edit.html.twig', [
                'page_title' => 'Modifier une prestation — Belle Maison Pro',
            ]);
        }
}
