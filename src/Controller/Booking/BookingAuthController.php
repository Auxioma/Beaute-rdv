<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingAuthController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/account', name: 'app_booking_auth', methods: ['GET'])]
        public function bookingAuth(): Response
        {
            return $this->render('booking/auth.html.twig', [
                'page_title' => 'Connexion ou inscription — Belle Maison',
            ]);
        }
}
