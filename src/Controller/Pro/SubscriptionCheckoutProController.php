<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SubscriptionCheckoutProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/subscription/checkout', name: 'app_subscription_checkout_pro', methods: ['GET'])]
        public function subscriptionCheckoutPro(): Response
        {
            return $this->render('pro/subscription_checkout.html.twig', [
                'page_title' => 'Finaliser l’abonnement — Belle Maison',
            ]);
        }
}
