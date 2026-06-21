<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SubscriptionProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/subscription', name: 'app_subscription_pro', methods: ['GET'])]
        public function subscriptionPro(): Response
        {
            return $this->render('pro/subscription.html.twig', [
                'page_title' => 'Mon abonnement — Belle Maison Pro',
            ]);
        }
}
