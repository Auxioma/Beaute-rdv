<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServicePackageCreateProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/services/packages/create', name: 'app_service_package_create_pro', methods: ['GET'])]
        public function servicePackageCreatePro(): Response
        {
            return $this->render('pro/service_package_create.html.twig', [
                'page_title' => 'Créer un forfait — Belle Maison Pro',
            ]);
        }
}
