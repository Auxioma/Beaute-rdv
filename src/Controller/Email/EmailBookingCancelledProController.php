<?php

namespace App\Controller\Email;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmailBookingCancelledProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/booking/cancelled/pro', name: 'app_email_booking_cancelled_pro', methods: ['GET'])]
        public function emailBookingCancelledPro(): Response
        {
            return $this->render('emails/booking_cancelled_pro.html.twig', [
                'page_title' => 'Rendez-vous annulé côté client',
            ]);
        }
}
