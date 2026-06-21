<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserCancelAppointmentController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/appointments/demo/cancel', name: 'app_user_cancel_appointment', methods: ['GET'])]
        public function userCancelAppointment(): Response
        {
            return $this->render('account/cancel_appointment.html.twig', [
                'page_title' => 'Annuler mon RDV — Belle Maison',
            ]);
        }
}
