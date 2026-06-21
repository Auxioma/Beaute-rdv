<?php

namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request): Response
    {
        return $this->redirectToRoute('app_register_user', [
            '_locale' => $request->getLocale(),
        ]);
    }
}
