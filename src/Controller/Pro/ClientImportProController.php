<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientImportProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients/import', name: 'app_client_import_pro', methods: ['GET'])]
        public function clientImportPro(): Response
        {
            return $this->render('pro/client_import.html.twig', [
                'page_title' => 'Importer des clients — Belle Maison Pro',
            ]);
        }
}
