<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TeamAbsenceProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/team/absences', name: 'app_team_absence_pro', methods: ['GET'])]
        public function teamAbsencePro(): Response
        {
            return $this->render('pro/team_absence.html.twig', [
                'page_title' => 'Absences et congés — Belle Maison Pro',
            ]);
        }
}
