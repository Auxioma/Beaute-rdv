<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AppointmentEditProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/appointments/demo/edit', name: 'app_appointment_edit_pro', methods: ['GET'])]
        public function appointmentEditPro(): Response
        {
            return $this->render('pro/appointment_edit.html.twig', [
                'page_title' => 'Modifier un rendez-vous — Belle Maison Pro',
            ]);
        }
}
