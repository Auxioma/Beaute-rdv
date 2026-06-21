<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserRescheduleAppointmentController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/appointments/demo/reschedule', name: 'app_user_reschedule_appointment', methods: ['GET'])]
        public function userRescheduleAppointment(): Response
        {
            return $this->render('account/reschedule_appointment.html.twig', [
                'page_title' => 'Reporter mon RDV — Belle Maison',
            ]);
        }
}
