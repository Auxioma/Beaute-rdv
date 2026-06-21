<?php

namespace App\Controller\Email;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmailNewBookingProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/new/booking/pro', name: 'app_email_new_booking_pro', methods: ['GET'])]
        public function emailNewBookingPro(): Response
        {
            return $this->render('emails/new_booking_pro.html.twig', [
                'page_title' => 'Nouveau rendez-vous reçu',
            ]);
        }
}
