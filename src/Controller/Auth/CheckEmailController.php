<?php

namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use SymfonyCasts\Bundle\ResetPassword\Controller\ResetPasswordControllerTrait;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;

final class CheckEmailController extends AbstractController
{
    use ResetPasswordControllerTrait;

    public function __construct(
        private readonly ResetPasswordHelperInterface $resetPasswordHelper,
    ) {
    }

    #[Route('/reset-password/check-email', name: 'app_check_email', methods: ['GET'])]
    public function checkEmailFallback(Request $request): Response
    {
        return $this->redirectToRoute('app_check_email_user', [
            '_locale' => $request->getLocale(),
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/password/check-email', name: 'app_check_email_user', methods: ['GET'])]
    public function checkEmailUser(): Response
    {
        return $this->renderCheckEmail(false);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/professionals/password/check-email', name: 'app_check_email_pro', methods: ['GET'])]
    public function checkEmailPro(): Response
    {
        return $this->renderCheckEmail(true);
    }

    private function renderCheckEmail(bool $isPro): Response
    {
        $resetToken = $this->getTokenObjectFromSession() ?? $this->resetPasswordHelper->generateFakeResetToken();

        return $this->render('reset_password/check_email.html.twig', [
            'page_title' => $isPro ? 'Email envoyé — Belle Maison Pro' : 'Email envoyé — Belle Maison',
            'is_pro' => $isPro,
            'resetToken' => $resetToken,
            'login_route' => $isPro ? 'app_login_pro' : 'app_login_user',
            'forgot_route' => $isPro ? 'app_forgot_password' : 'app_forgot_password_user',
        ]);
    }
}
