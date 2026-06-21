<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SettingsBookingRulesProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/booking-rules', name: 'app_settings_booking_rules_pro', methods: ['GET'])]
        public function settingsBookingRulesPro(): Response
        {
            return $this->render('pro/settings_booking_rules.html.twig', [
                'page_title' => 'Règles de réservation — Belle Maison Pro',
            ]);
        }
}
