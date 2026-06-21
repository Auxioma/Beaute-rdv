<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServiceDetailProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/services/demo', name: 'app_service_detail_pro', methods: ['GET'])]
        public function serviceDetailPro(): Response
        {
            return $this->render('pro/service_detail.html.twig', [
                'page_title' => 'Fiche prestation — Belle Maison Pro',
            ]);
        }
}
