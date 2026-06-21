<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SalonDetailController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/salons/maison-eclat-paris', name: 'app_salon_detail', methods: ['GET'])]
        public function salonDetail(): Response
        {
            return $this->render('public/salon_detail.html.twig', [
                'page_title' => 'Maison Élégance — Fiche salon',
            ]);
        }
}
