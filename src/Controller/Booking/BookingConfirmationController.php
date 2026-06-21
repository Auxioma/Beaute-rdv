<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingConfirmationController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/confirmation', name: 'app_booking_confirmation', methods: ['GET'])]
        public function bookingConfirmation(): Response
        {
            return $this->render('booking/confirmation.html.twig', [
                'page_title' => 'Rendez-vous confirmé — Belle Maison',
            ]);
        }
}
