<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingNoSlotsController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/no-slots', name: 'app_booking_no_slots', methods: ['GET'])]
        public function bookingNoSlots(): Response
        {
            return $this->render('booking/no_slots.html.twig', [
                'page_title' => 'Aucun créneau disponible — Belle Maison',
            ]);
        }
}
