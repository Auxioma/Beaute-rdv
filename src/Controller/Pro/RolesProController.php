<?php

namespace App\Controller\Pro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RolesProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/roles', name: 'app_roles_pro', methods: ['GET'])]
        public function rolesPro(): Response
        {
            return $this->render('pro/roles.html.twig', [
                'page_title' => 'Permissions & rôles — Belle Maison Pro',
            ]);
        }
}
