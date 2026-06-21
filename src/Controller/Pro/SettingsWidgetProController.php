<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SettingsWidgetProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/widget', name: 'app_settings_widget_pro', methods: ['GET'])]
        public function settingsWidgetPro(): Response
        {
            return $this->render('pro/settings_widget.html.twig', [
                'page_title' => 'Widget de réservation — Belle Maison Pro',
            ]);
        }
}
