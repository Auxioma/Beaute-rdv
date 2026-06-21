<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingSlotExpiredController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/slot-expired', name: 'app_booking_slot_expired', methods: ['GET'])]
        public function bookingSlotExpired(): Response
        {
            return $this->render('booking/slot_expired.html.twig', [
                'page_title' => 'Créneau expiré — Belle Maison',
            ]);
        }
}
