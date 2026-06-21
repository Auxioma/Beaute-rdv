<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserReviewFormController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/reviews/new', name: 'app_user_review_form', methods: ['GET'])]
        public function userReviewForm(): Response
        {
            return $this->render('account/review_form.html.twig', [
                'page_title' => 'Laisser un avis — Belle Maison',
            ]);
        }
}
