<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AppointmentNoShowProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/appointments/demo/no-show', name: 'app_appointment_no_show_pro', methods: ['GET'])]
        public function appointmentNoShowPro(): Response
        {
            return $this->render('pro/appointment_no_show.html.twig', [
                'page_title' => 'Marquer no-show — Belle Maison Pro',
            ]);
        }
}
