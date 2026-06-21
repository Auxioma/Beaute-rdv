<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SubscriptionSuccessProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/subscription/success', name: 'app_subscription_success_pro', methods: ['GET'])]
        public function subscriptionSuccessPro(): Response
        {
            return $this->render('pro/subscription_success.html.twig', [
                'page_title' => 'Abonnement activé — Belle Maison',
            ]);
        }
}
