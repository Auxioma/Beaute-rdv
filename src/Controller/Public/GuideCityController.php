<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GuideCityController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/guides/paris', name: 'app_guide_city', methods: ['GET'])]
        public function guideCity(): Response
        {
            return $this->render('public/guide_city.html.twig', [
                'page_title' => 'Guide beauté du Havre — Belle Maison',
            ]);
        }
}
