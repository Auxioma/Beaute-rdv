<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WaitlistProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/waitlist', name: 'app_waitlist_pro', methods: ['GET'])]
        public function waitlistPro(): Response
        {
            return $this->render('pro/waitlist.html.twig', [
                'page_title' => 'Liste d’attente — Belle Maison Pro',
            ]);
        }
}
