<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BillingPaymentMethodProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/billing/payment-method', name: 'app_billing_payment_method_pro', methods: ['GET'])]
        public function billingPaymentMethodPro(): Response
        {
            return $this->render('pro/billing_payment_method.html.twig', [
                'page_title' => 'Moyen de paiement — Belle Maison Pro',
            ]);
        }
}
