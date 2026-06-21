<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/dashboard', name: 'app_dashboard_pro', methods: ['GET'])]
        public function dashboardPro(): Response
        {
            return $this->render('pro/dashboard.html.twig', [
                'page_title' => 'Tableau de bord — Belle Maison Pro',
            ]);
        }
}
