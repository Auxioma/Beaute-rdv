<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingServiceController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/services', name: 'app_booking_service', methods: ['GET'])]
        public function bookingService(): Response
        {
            return $this->render('booking/service.html.twig', [
                'page_title' => 'Choix des prestations — Belle Maison',
            ]);
        }
}
