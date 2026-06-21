<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AppointmentCancelProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/appointments/demo/cancel', name: 'app_appointment_cancel_pro', methods: ['GET'])]
        public function appointmentCancelPro(): Response
        {
            return $this->render('pro/appointment_cancel.html.twig', [
                'page_title' => 'Annuler un rendez-vous — Belle Maison Pro',
            ]);
        }
}
