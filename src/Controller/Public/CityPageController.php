<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CityPageController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/cities/paris', name: 'app_city_page', methods: ['GET'])]
        public function cityPage(): Response
        {
            return $this->render('public/city_page.html.twig', [
                'page_title' => 'Beauté au Havre — Belle Maison',
            ]);
        }
}
