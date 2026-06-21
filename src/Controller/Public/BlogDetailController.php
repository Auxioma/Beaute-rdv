<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BlogDetailController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/blog/beauty-trends', name: 'app_blog_detail', methods: ['GET'])]
        public function blogDetail(): Response
        {
            return $this->render('public/blog_detail.html.twig', [
                'page_title' => 'Comment choisir le bon salon de coiffure ? — Belle Maison',
            ]);
        }
}
