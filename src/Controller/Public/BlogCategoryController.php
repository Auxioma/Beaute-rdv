<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BlogCategoryController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/blog/categories/beauty', name: 'app_blog_category', methods: ['GET'])]
        public function blogCategory(): Response
        {
            return $this->render('public/blog_category.html.twig', [
                'page_title' => 'Conseils coiffure — Belle Maison',
            ]);
        }
}
