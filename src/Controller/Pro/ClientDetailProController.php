<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientDetailProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients/demo', name: 'app_client_detail_pro', methods: ['GET'])]
        public function clientDetailPro(): Response
        {
            return $this->render('pro/client_detail.html.twig', [
                'page_title' => 'Fiche client — Belle Maison Pro',
            ]);
        }
}
