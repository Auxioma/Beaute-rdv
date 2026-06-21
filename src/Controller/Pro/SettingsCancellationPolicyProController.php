<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SettingsCancellationPolicyProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/cancellation-policy', name: 'app_settings_cancellation_policy_pro', methods: ['GET'])]
        public function settingsCancellationPolicyPro(): Response
        {
            return $this->render('pro/settings_cancellation_policy.html.twig', [
                'page_title' => 'Politique d’annulation — Belle Maison Pro',
            ]);
        }
}
