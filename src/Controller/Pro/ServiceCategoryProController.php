<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServiceCategoryProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/services/categories', name: 'app_service_category_pro', methods: ['GET'])]
        public function serviceCategoryPro(): Response
        {
            return $this->render('pro/service_category.html.twig', [
                'page_title' => 'Catégories de prestations — Belle Maison Pro',
            ]);
        }
}
