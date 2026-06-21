<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NotificationsProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/notifications', name: 'app_notifications_pro', methods: ['GET'])]
        public function notificationsPro(): Response
        {
            return $this->render('pro/notifications.html.twig', [
                'page_title' => 'Notifications & communications — Belle Maison Pro',
            ]);
        }
}
