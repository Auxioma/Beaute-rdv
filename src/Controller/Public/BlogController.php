<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BlogController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/blog', name: 'app_blog', methods: ['GET'])]
        public function blog(): Response
        {
            return $this->render('public/blog.html.twig', [
                'page_title' => 'Magazine beauté — Belle Maison',
            ]);
        }
}
