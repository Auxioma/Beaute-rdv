<?php

namespace App\Controller\Email;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmailSubscriptionInvoiceProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/subscription/invoice/pro', name: 'app_email_subscription_invoice_pro', methods: ['GET'])]
        public function emailSubscriptionInvoicePro(): Response
        {
            return $this->render('emails/subscription_invoice_pro.html.twig', [
                'page_title' => 'Votre facture Belle Maison Pro',
            ]);
        }
}
