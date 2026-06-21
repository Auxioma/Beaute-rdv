<?php

namespace App\Controller\Email;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmailResetPasswordUserController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/reset/password/user', name: 'app_email_reset_password_user', methods: ['GET'])]
        public function emailResetPasswordUser(): Response
        {
            return $this->render('emails/reset_password_user.html.twig', [
                'page_title' => 'Réinitialisation de mot de passe',
            ]);
        }
}
