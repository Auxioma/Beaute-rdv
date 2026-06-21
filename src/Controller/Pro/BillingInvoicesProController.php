<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BillingInvoicesProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/billing/invoices', name: 'app_billing_invoices_pro', methods: ['GET'])]
        public function billingInvoicesPro(): Response
        {
            return $this->render('pro/billing_invoices.html.twig', [
                'page_title' => 'Factures — Belle Maison Pro',
            ]);
        }
}
