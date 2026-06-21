<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SettingsIntegrationsProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/integrations', name: 'app_settings_integrations_pro', methods: ['GET'])]
        public function settingsIntegrationsPro(): Response
        {
            return $this->render('pro/settings_integrations.html.twig', [
                'page_title' => 'Connecteurs — Belle Maison Pro',
            ]);
        }
}
