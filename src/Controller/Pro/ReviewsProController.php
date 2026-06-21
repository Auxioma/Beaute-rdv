<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ReviewsProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/reviews', name: 'app_reviews_pro', methods: ['GET'])]
        public function reviewsPro(): Response
        {
            return $this->render('pro/reviews.html.twig', [
                'page_title' => 'Avis & réputation — Belle Maison Pro',
            ]);
        }
}
