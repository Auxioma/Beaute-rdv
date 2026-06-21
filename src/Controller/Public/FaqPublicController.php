<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FaqPublicController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/faq', name: 'app_faq_public', methods: ['GET'])]
        public function faqPublic(): Response
        {
            return $this->render('public/faq_public.html.twig', [
                'page_title' => 'FAQ Belle Maison — Belle Maison',
            ]);
        }
}
