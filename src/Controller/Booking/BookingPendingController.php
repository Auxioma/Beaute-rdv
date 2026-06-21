<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingPendingController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/pending', name: 'app_booking_pending', methods: ['GET'])]
        public function bookingPending(): Response
        {
            return $this->render('booking/pending.html.twig', [
                'page_title' => 'Demande en attente — Belle Maison',
            ]);
        }
}
