<?php

namespace App\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserSupportDetailController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/support/demo', name: 'app_user_support_detail', methods: ['GET'])]
        public function userSupportDetail(): Response
        {
            return $this->render('account/support_detail.html.twig', [
                'page_title' => 'Détail support — Belle Maison',
            ]);
        }
}
