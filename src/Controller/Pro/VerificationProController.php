<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VerificationProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/verification', name: 'app_verification_pro', methods: ['GET'])]
        public function verificationPro(): Response
        {
            return $this->render('pro/verification.html.twig', [
                'page_title' => 'Vérification du compte — Belle Maison Pro',
            ]);
        }
}
