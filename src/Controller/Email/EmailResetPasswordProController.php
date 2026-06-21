<?php

namespace App\Controller\Email;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmailResetPasswordProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/reset/password/pro', name: 'app_email_reset_password_pro', methods: ['GET'])]
        public function emailResetPasswordPro(): Response
        {
            return $this->render('emails/reset_password_pro.html.twig', [
                'page_title' => 'Mot de passe pro',
            ]);
        }
}
