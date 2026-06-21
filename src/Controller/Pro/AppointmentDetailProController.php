<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AppointmentDetailProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/appointments/demo', name: 'app_appointment_detail_pro', methods: ['GET'])]
        public function appointmentDetailPro(): Response
        {
            return $this->render('pro/appointment_detail.html.twig', [
                'page_title' => 'Fiche rendez-vous — Belle Maison Pro',
            ]);
        }
}
