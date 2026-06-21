<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingSummaryController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/summary', name: 'app_booking_summary', methods: ['GET'])]
        public function bookingSummary(): Response
        {
            return $this->render('booking/summary.html.twig', [
                'page_title' => 'Récapitulatif du rendez-vous — Belle Maison',
            ]);
        }
}
