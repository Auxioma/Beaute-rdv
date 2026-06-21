<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserNotificationPreferencesController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/notification-preferences', name: 'app_user_notification_preferences', methods: ['GET'])]
        public function userNotificationPreferences(): Response
        {
            return $this->render('account/notification_preferences.html.twig', [
                'page_title' => 'Préférences de notification — Belle Maison',
            ]);
        }
}
