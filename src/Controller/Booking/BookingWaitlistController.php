<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingWaitlistController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/waitlist', name: 'app_booking_waitlist', methods: ['GET'])]
        public function bookingWaitlist(): Response
        {
            return $this->render('booking/waitlist.html.twig', [
                'page_title' => 'Liste d’attente — Belle Maison',
            ]);
        }
}
