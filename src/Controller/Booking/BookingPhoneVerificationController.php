<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingPhoneVerificationController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/phone-verification', name: 'app_booking_phone_verification', methods: ['GET'])]
        public function bookingPhoneVerification(): Response
        {
            return $this->render('booking/phone_verification.html.twig', [
                'page_title' => 'Vérification du téléphone — Belle Maison',
            ]);
        }
}
