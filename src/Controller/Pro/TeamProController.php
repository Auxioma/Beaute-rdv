<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TeamProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/team', name: 'app_team_pro', methods: ['GET'])]
        public function teamPro(): Response
        {
            return $this->render('pro/team.html.twig', [
                'page_title' => 'Équipe & collaborateurs — Belle Maison Pro',
            ]);
        }
}
