<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AppointmentRescheduleProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/appointments/demo/reschedule', name: 'app_appointment_reschedule_pro', methods: ['GET'])]
        public function appointmentReschedulePro(): Response
        {
            return $this->render('pro/appointment_reschedule.html.twig', [
                'page_title' => 'Reporter un rendez-vous — Belle Maison Pro',
            ]);
        }
}
