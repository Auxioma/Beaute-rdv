<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LegalNoticeController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/legal-notice', name: 'app_legal_notice', methods: ['GET'])]
        public function legalNotice(): Response
        {
            return $this->render('public/legal_notice.html.twig', [
                'page_title' => 'Mentions légales — Belle Maison',
            ]);
        }
}
