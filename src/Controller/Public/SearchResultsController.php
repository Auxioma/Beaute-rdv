<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SearchResultsController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/search', name: 'app_search_results', methods: ['GET'])]
        public function searchResults(): Response
        {
            return $this->render('public/search_results.html.twig', [
                'page_title' => 'Recherche salons — Belle Maison',
            ]);
        }
}
