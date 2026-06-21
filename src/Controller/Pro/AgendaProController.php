<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AgendaProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/agenda', name: 'app_agenda_pro', methods: ['GET'])]
        public function agendaPro(): Response
        {
            return $this->render('pro/agenda.html.twig', [
                'page_title' => 'Agenda & planning — Belle Maison Pro',
            ]);
        }
}
