<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServicesProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/services', name: 'app_services_pro', methods: ['GET'])]
        public function servicesPro(): Response
        {
            return $this->render('pro/services.html.twig', [
                'page_title' => 'Catalogue de prestations — Belle Maison Pro',
            ]);
        }
}
