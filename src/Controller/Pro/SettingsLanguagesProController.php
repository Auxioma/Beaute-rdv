<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SettingsLanguagesProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/languages', name: 'app_settings_languages_pro', methods: ['GET'])]
        public function settingsLanguagesPro(): Response
        {
            return $this->render('pro/settings_languages.html.twig', [
                'page_title' => 'Langues — Belle Maison Pro',
            ]);
        }
}
