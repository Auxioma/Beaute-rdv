<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SettingsLegalProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/legal', name: 'app_settings_legal_pro', methods: ['GET'])]
        public function settingsLegalPro(): Response
        {
            return $this->render('pro/settings_legal.html.twig', [
                'page_title' => 'Paramètres légaux — Belle Maison Pro',
            ]);
        }
}
