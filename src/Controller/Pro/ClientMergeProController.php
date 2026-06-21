<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientMergeProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients/merge', name: 'app_client_merge_pro', methods: ['GET'])]
        public function clientMergePro(): Response
        {
            return $this->render('pro/client_merge.html.twig', [
                'page_title' => 'Fusionner des doublons — Belle Maison Pro',
            ]);
        }
}
