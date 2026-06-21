<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SettingsNotificationsProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/notifications', name: 'app_settings_notifications_pro', methods: ['GET'])]
        public function settingsNotificationsPro(): Response
        {
            return $this->render('pro/settings_notifications.html.twig', [
                'page_title' => 'Paramètres notifications — Belle Maison Pro',
            ]);
        }
}
