<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SettingsProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings', name: 'app_settings_pro', methods: ['GET'])]
        public function settingsPro(): Response
        {
            return $this->render('pro/settings.html.twig', [
                'page_title' => 'Paramètres établissement — Belle Maison Pro',
            ]);
        }
}
