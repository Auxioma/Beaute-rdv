<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HelpCenterController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/help', name: 'app_help_center', methods: ['GET'])]
        public function helpCenter(): Response
        {
            return $this->render('public/help_center.html.twig', [
                'page_title' => 'Centre d’aide — Belle Maison',
            ]);
        }
}
