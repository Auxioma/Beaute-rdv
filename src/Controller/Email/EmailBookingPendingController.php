<?php

namespace App\Controller\Email;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmailBookingPendingController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/booking/pending', name: 'app_email_booking_pending', methods: ['GET'])]
        public function emailBookingPending(): Response
        {
            return $this->render('emails/booking_pending.html.twig', [
                'page_title' => 'Demande en attente',
            ]);
        }
}
