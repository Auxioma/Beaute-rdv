<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientsProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients', name: 'app_clients_pro', methods: ['GET'])]
        public function clientsPro(): Response
        {
            return $this->render('pro/clients.html.twig', [
                'page_title' => 'Clients & mini-CRM — Belle Maison Pro',
            ]);
        }
}
