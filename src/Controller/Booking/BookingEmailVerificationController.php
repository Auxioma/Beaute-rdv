<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingEmailVerificationController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/email-verification', name: 'app_booking_email_verification', methods: ['GET'])]
        public function bookingEmailVerification(): Response
        {
            return $this->render('booking/email_verification.html.twig', [
                'page_title' => 'Vérification de l’email — Belle Maison',
            ]);
        }
}
