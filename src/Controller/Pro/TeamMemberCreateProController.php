<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TeamMemberCreateProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/team/create', name: 'app_team_member_create_pro', methods: ['GET'])]
        public function teamMemberCreatePro(): Response
        {
            return $this->render('pro/team_member_create.html.twig', [
                'page_title' => 'Ajouter un collaborateur — Belle Maison Pro',
            ]);
        }
}
