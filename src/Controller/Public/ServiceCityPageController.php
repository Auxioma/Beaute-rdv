<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServiceCityPageController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/services/haircut/paris', name: 'app_service_city_page', methods: ['GET'])]
        public function serviceCityPage(): Response
        {
            return $this->render('public/service_city_page.html.twig', [
                'page_title' => 'Balayage au Havre — Belle Maison',
            ]);
        }
}
