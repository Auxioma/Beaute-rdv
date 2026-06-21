<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PaymentsProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/payments', name: 'app_payments_pro', methods: ['GET'])]
        public function paymentsPro(): Response
        {
            return $this->render('pro/payments.html.twig', [
                'page_title' => 'Paiements & facturation — Belle Maison Pro',
            ]);
        }
}
