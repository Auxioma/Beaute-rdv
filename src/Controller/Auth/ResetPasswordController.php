<?php

namespace App\Controller\Auth;

use App\Entity\Auth\User;
use App\Form\ChangePasswordFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\ResetPassword\Controller\ResetPasswordControllerTrait;
use SymfonyCasts\Bundle\ResetPassword\Exception\ResetPasswordExceptionInterface;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;

final class ResetPasswordController extends AbstractController
{
    use ResetPasswordControllerTrait;

    public function __construct(
        private readonly ResetPasswordHelperInterface $resetPasswordHelper,
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    #[Route('/reset-password/reset/{token}', name: 'app_reset_password', defaults: ['token' => null], methods: ['GET', 'POST'])]
    public function resetFallback(Request $request, UserPasswordHasherInterface $passwordHasher, TranslatorInterface $translator, ?string $token = null): Response
    {
        return $this->handleReset('user', $request, $passwordHasher, $translator, $token);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/password/reset/{token}', name: 'app_reset_password_user', defaults: ['token' => null], methods: ['GET', 'POST'])]
    public function resetUser(Request $request, UserPasswordHasherInterface $passwordHasher, TranslatorInterface $translator, ?string $token = null): Response
    {
        return $this->handleReset('user', $request, $passwordHasher, $translator, $token);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/professionals/password/reset/{token}', name: 'app_reset_password_pro', defaults: ['token' => null], methods: ['GET', 'POST'])]
    public function resetPro(Request $request, UserPasswordHasherInterface $passwordHasher, TranslatorInterface $translator, ?string $token = null): Response
    {
        return $this->handleReset('pro', $request, $passwordHasher, $translator, $token);
    }

    private function handleReset(string $flow, Request $request, UserPasswordHasherInterface $passwordHasher, TranslatorInterface $translator, ?string $token = null): Response
    {
        if ($token) {
            $this->storeTokenInSession($token);

            return $this->redirectToRoute($flow === 'pro' ? 'app_reset_password_pro' : 'app_reset_password_user', [
                '_locale' => $request->getLocale(),
            ]);
        }

        $storedToken = $this->getTokenFromSession();

        if (null === $storedToken) {
            throw $this->createNotFoundException('Aucun jeton de réinitialisation trouvé.');
        }

        try {
            /** @var User $user */
            $user = $this->resetPasswordHelper->validateTokenAndFetchUser($storedToken);
        } catch (ResetPasswordExceptionInterface $exception) {
            $this->addFlash('reset_password_error', $translator->trans($exception->getReason(), [], 'ResetPasswordBundle'));

            return $this->redirectToRoute($flow === 'pro' ? 'app_forgot_password' : 'app_forgot_password_user', [
                '_locale' => $request->getLocale(),
            ]);
        }

        $form = $this->createForm(ChangePasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->resetPasswordHelper->removeResetRequest($storedToken);

            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            $user->setPassword($passwordHasher->hashPassword($user, $plainPassword));
            $this->entityManager->flush();

            $this->cleanSessionAfterReset();
            $this->addFlash('success', $translator->trans('auth.flash.password_reset_success'));

            return $this->redirectToRoute($user->getType() === User::TYPE_PRO || $user->getType() === User::TYPE_STAFF ? 'app_login_pro' : 'app_login_user', [
                '_locale' => $user->getLocale(),
            ]);
        }

        return $this->render('reset_password/reset.html.twig', [
            'page_title' => $flow === 'pro' ? 'Nouveau mot de passe — Belle Maison Pro' : 'Nouveau mot de passe — Belle Maison',
            'is_pro' => $flow === 'pro',
            'resetForm' => $form->createView(),
            'login_route' => $flow === 'pro' ? 'app_login_pro' : 'app_login_user',
        ]);
    }
}
