<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingPresenceConfirmationController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/presence-confirmation', name: 'app_booking_presence_confirmation', methods: ['GET'])]
        public function bookingPresenceConfirmation(): Response
        {
            return $this->render('booking/presence_confirmation.html.twig', [
                'page_title' => 'Confirmer ma présence — Belle Maison',
            ]);
        }
}
