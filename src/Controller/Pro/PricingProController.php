<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PricingProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/pricing', name: 'app_pricing_pro', methods: ['GET'])]
        public function pricingPro(): Response
        {
            return $this->render('pro/pricing.html.twig', [
                'page_title' => 'Tarifs professionnels — Belle Maison',
            ]);
        }
}
