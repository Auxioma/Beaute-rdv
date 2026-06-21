<?php

namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ForgotPasswordRequestController extends AbstractController
{
    #[Route('/reset-password', name: 'app_forgot_password_request', methods: ['GET', 'POST'])]
    public function request(Request $request): Response
    {
        return $this->redirectToRoute('app_forgot_password_user', [
            '_locale' => $request->getLocale(),
        ]);
    }
}
