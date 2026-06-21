<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserNotificationsController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/notifications', name: 'app_user_notifications', methods: ['GET'])]
        public function userNotifications(): Response
        {
            return $this->render('account/notifications.html.twig', [
                'page_title' => 'Notifications — Belle Maison',
            ]);
        }
}
