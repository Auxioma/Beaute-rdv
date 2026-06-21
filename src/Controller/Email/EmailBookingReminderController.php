<?php

namespace App\Controller\Email;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmailBookingReminderController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/booking/reminder', name: 'app_email_booking_reminder', methods: ['GET'])]
        public function emailBookingReminder(): Response
        {
            return $this->render('emails/booking_reminder.html.twig', [
                'page_title' => 'Rappel de rendez-vous',
            ]);
        }
}
