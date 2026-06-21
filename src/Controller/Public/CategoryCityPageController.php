<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryCityPageController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/hair-salons/paris', name: 'app_category_city_page', methods: ['GET'])]
        public function categoryCityPage(): Response
        {
            return $this->render('public/category_city_page.html.twig', [
                'page_title' => 'Coiffeur au Havre — Belle Maison',
            ]);
        }
}
