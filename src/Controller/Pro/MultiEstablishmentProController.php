<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MultiEstablishmentProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/establishments', name: 'app_multi_establishment_pro', methods: ['GET'])]
        public function multiEstablishmentPro(): Response
        {
            return $this->render('pro/multi_establishment.html.twig', [
                'page_title' => 'Multi-établissement — Belle Maison Pro',
            ]);
        }
}
