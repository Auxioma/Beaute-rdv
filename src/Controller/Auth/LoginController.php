<?php

namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LoginController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(Request $request): Response
    {
        return $this->redirectToRoute('app_login_user', [
            '_locale' => $request->getLocale(),
        ]);
    }
}
