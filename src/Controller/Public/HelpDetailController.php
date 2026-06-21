<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HelpDetailController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/help/booking', name: 'app_help_detail', methods: ['GET'])]
        public function helpDetail(): Response
        {
            return $this->render('public/help_detail.html.twig', [
                'page_title' => 'Aide : gérer un rendez-vous — Belle Maison',
            ]);
        }
}
