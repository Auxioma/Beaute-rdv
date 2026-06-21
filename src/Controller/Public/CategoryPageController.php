<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryPageController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/categories/beauty', name: 'app_category_page', methods: ['GET'])]
        public function categoryPage(): Response
        {
            return $this->render('public/category_page.html.twig', [
                'page_title' => 'Catégories beauté — Belle Maison',
            ]);
        }
}
