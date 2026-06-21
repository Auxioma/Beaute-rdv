<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserAppointmentDetailController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/appointments/demo', name: 'app_user_appointment_detail', methods: ['GET'])]
        public function userAppointmentDetail(): Response
        {
            return $this->render('account/appointment_detail.html.twig', [
                'page_title' => 'Détail du rendez-vous — Belle Maison',
            ]);
        }
}
