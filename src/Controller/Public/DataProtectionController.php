<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DataProtectionController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/data-protection', name: 'app_data_protection', methods: ['GET'])]
        public function dataProtection(): Response
        {
            return $this->render('public/data_protection.html.twig', [
                'page_title' => 'Protection des données — Belle Maison',
            ]);
        }
}
