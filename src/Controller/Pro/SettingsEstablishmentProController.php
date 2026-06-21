<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SettingsEstablishmentProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/establishment', name: 'app_settings_establishment_pro', methods: ['GET'])]
        public function settingsEstablishmentPro(): Response
        {
            return $this->render('pro/settings_establishment.html.twig', [
                'page_title' => 'Informations établissement — Belle Maison Pro',
            ]);
        }
}
