<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MarketingProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/marketing', name: 'app_marketing_pro', methods: ['GET'])]
        public function marketingPro(): Response
        {
            return $this->render('pro/marketing.html.twig', [
                'page_title' => 'Marketing & fidélisation — Belle Maison Pro',
            ]);
        }
}
