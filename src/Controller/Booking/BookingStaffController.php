<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingStaffController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/staff', name: 'app_booking_staff', methods: ['GET'])]
        public function bookingStaff(): Response
        {
            return $this->render('booking/staff.html.twig', [
                'page_title' => 'Choix du collaborateur — Belle Maison',
            ]);
        }
}
