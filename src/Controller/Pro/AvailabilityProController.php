<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AvailabilityProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/availability', name: 'app_availability_pro', methods: ['GET'])]
        public function availabilityPro(): Response
        {
            return $this->render('pro/availability.html.twig', [
                'page_title' => 'Disponibilités & règles — Belle Maison Pro',
            ]);
        }
}
