<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientEditProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients/demo/edit', name: 'app_client_edit_pro', methods: ['GET'])]
        public function clientEditPro(): Response
        {
            return $this->render('pro/client_edit.html.twig', [
                'page_title' => 'Modifier un client — Belle Maison Pro',
            ]);
        }
}
