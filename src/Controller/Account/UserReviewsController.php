<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserReviewsController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/reviews', name: 'app_user_reviews', methods: ['GET'])]
        public function userReviews(): Response
        {
            return $this->render('account/reviews.html.twig', [
                'page_title' => 'Mes avis — Belle Maison',
            ]);
        }
}
