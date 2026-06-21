<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TeamHolidaysProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/team/holidays', name: 'app_team_holidays_pro', methods: ['GET'])]
        public function teamHolidaysPro(): Response
        {
            return $this->render('pro/team_holidays.html.twig', [
                'page_title' => 'Calendrier d’équipe — Belle Maison Pro',
            ]);
        }
}
