<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TeamMemberEditProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/team/demo/edit', name: 'app_team_member_edit_pro', methods: ['GET'])]
        public function teamMemberEditPro(): Response
        {
            return $this->render('pro/team_member_edit.html.twig', [
                'page_title' => 'Modifier un collaborateur — Belle Maison Pro',
            ]);
        }
}
