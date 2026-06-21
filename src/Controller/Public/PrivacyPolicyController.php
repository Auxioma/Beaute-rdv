<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PrivacyPolicyController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/privacy-policy', name: 'app_privacy_policy', methods: ['GET'])]
        public function privacyPolicy(): Response
        {
            return $this->render('public/privacy_policy.html.twig', [
                'page_title' => 'Politique de confidentialité — Belle Maison',
            ]);
        }
}
