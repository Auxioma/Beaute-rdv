<?php

namespace App\Controller\Auth;

use App\Entity\Auth\User;
use App\Repository\Auth\UserRepository;
use App\Security\EmailVerifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

final class VerifyEmailController extends AbstractController
{
    public function __construct(private readonly EmailVerifier $emailVerifier)
    {
    }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator, UserRepository $userRepository): Response
    {
        $userId = $request->query->get('id');
        $user = null !== $userId ? $userRepository->find($userId) : null;
        $locale = $user instanceof User ? $user->getLocale() : $request->getLocale();

        if (!$user instanceof User) {
            $this->addFlash('verify_email_error', 'Unable to verify your email address.');

            return $this->redirectToRoute('app_register_user', [
                '_locale' => $locale,
            ]);
        }

        try {
            $this->emailVerifier->handleEmailConfirmation($request, $user);
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute($user->getType() === User::TYPE_PRO ? 'app_register_pro' : 'app_register_user', [
                '_locale' => $locale,
            ]);
        }

        $this->addFlash('success', 'Votre adresse email a bien été validée. Vous pouvez maintenant vous connecter.');

        return $this->redirectToRoute($user->getType() === User::TYPE_PRO ? 'app_login_pro' : 'app_login_user', [
            '_locale' => $locale,
        ]);
    }
}
