<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}', name: 'app_home', methods: ['GET'])]
        public function home(): Response
        {
            return $this->render('public/index.html.twig', [
                'page_title' => 'Belle Maison — Réservation beauté, coiffure & bien-être',
            ]);
        }
}
