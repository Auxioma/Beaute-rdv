<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TermsController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/terms', name: 'app_terms', methods: ['GET'])]
        public function terms(): Response
        {
            return $this->render('public/terms.html.twig', [
                'page_title' => 'Conditions générales d’utilisation — Belle Maison',
            ]);
        }
}
