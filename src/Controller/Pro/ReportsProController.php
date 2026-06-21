<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ReportsProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/reports', name: 'app_reports_pro', methods: ['GET'])]
        public function reportsPro(): Response
        {
            return $this->render('pro/reports.html.twig', [
                'page_title' => 'Statistiques & reporting — Belle Maison Pro',
            ]);
        }
}
