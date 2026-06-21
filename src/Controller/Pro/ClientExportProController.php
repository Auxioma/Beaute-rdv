<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientExportProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients/export', name: 'app_client_export_pro', methods: ['GET'])]
        public function clientExportPro(): Response
        {
            return $this->render('pro/client_export.html.twig', [
                'page_title' => 'Exporter les clients — Belle Maison Pro',
            ]);
        }
}
