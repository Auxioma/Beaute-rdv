<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AppointmentCreateProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/appointments/create', name: 'app_appointment_create_pro', methods: ['GET'])]
        public function appointmentCreatePro(): Response
        {
            return $this->render('pro/appointment_create.html.twig', [
                'page_title' => 'Créer un rendez-vous — Belle Maison Pro',
            ]);
        }
}
