<?php

namespace App\Controller\System;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MaintenanceController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/maintenance', name: 'app_maintenance', methods: ['GET'])]
        public function maintenance(): Response
        {
            return $this->render('system/maintenance.html.twig', [
                'page_title' => 'Maintenance — Belle Maison',
            ]);
        }
}
