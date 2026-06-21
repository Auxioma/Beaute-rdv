<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BillingProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/billing', name: 'app_billing_pro', methods: ['GET'])]
        public function billingPro(): Response
        {
            return $this->render('pro/billing.html.twig', [
                'page_title' => 'Facturation SaaS — Belle Maison Pro',
            ]);
        }
}
