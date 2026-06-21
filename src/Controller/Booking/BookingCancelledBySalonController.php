<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingCancelledBySalonController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/cancelled-by-salon', name: 'app_booking_cancelled_by_salon', methods: ['GET'])]
        public function bookingCancelledBySalon(): Response
        {
            return $this->render('booking/cancelled_by_salon.html.twig', [
                'page_title' => 'Rendez-vous annulé par le salon — Belle Maison',
            ]);
        }
}
