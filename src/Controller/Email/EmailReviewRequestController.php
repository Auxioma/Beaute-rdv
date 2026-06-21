<?php

namespace App\Controller\Email;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmailReviewRequestController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/review/request', name: 'app_email_review_request', methods: ['GET'])]
        public function emailReviewRequest(): Response
        {
            return $this->render('emails/review_request.html.twig', [
                'page_title' => 'Comment s’est passée votre visite ?',
            ]);
        }
}
