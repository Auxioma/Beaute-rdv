<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserAppointmentsController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/appointments', name: 'app_user_appointments', methods: ['GET'])]
        public function userAppointments(): Response
        {
            return $this->render('account/appointments.html.twig', [
                'page_title' => 'Mes rendez-vous — Belle Maison',
            ]);
        }
}
