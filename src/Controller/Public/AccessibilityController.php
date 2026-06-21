<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccessibilityController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/accessibility', name: 'app_accessibility', methods: ['GET'])]
        public function accessibility(): Response
        {
            return $this->render('public/accessibility.html.twig', [
                'page_title' => 'Accessibilité — Belle Maison',
            ]);
        }
}
