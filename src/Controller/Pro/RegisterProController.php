<?php

namespace App\Controller\Pro;

use App\Entity\Auth\User;
use App\Form\Model\RegisterProData;
use App\Form\RegisterProFormType;
use App\Repository\Auth\UserRepository;
use App\Security\EmailVerifier;
use App\Service\RegistrationManager;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

final class RegisterProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/professionals/register', name: 'app_register_pro', methods: ['GET', 'POST'])]
    public function registerPro(
        Request $request,
        UserRepository $userRepository,
        RegistrationManager $registrationManager,
        EmailVerifier $emailVerifier,
        TranslatorInterface $translator,
    ): Response {
        $form = $this->createForm(RegisterProFormType::class, new RegisterProData());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var RegisterProData $data */
            $data = $form->getData();
            $normalizedEmail = strtolower(trim((string) $data->email));
            $existingUser = $userRepository->findOneBy(['email' => $normalizedEmail]);

            if ($existingUser instanceof User) {
                if (!$existingUser->isVerified()) {
                    $emailVerifier->sendEmailConfirmation(
                        'app_verify_email',
                        $existingUser,
                        (new TemplatedEmail())
                            ->from(new Address('hello@rebel-refine.pro', 'Belle Maison'))
                            ->to((string) $existingUser->getEmail())
                            ->subject($translator->trans('auth.email.verify.pro_subject'))
                            ->htmlTemplate('emails/verify_email.html.twig')
                            ->context([
                                'user' => $existingUser,
                            ])
                    );

                    $this->addFlash('success', $translator->trans('auth.flash.verify_email_resent'));

                    return $this->redirectToRoute('app_login_pro', [
                        '_locale' => $request->getLocale(),
                    ]);
                }

                $form->get('email')->addError(new FormError('Cette adresse email est déjà utilisée.'));
            } else {
                $user = $registrationManager->registerProfessional($data, (string) $request->getLocale());

                $emailVerifier->sendEmailConfirmation(
                    'app_verify_email',
                    $user,
                    (new TemplatedEmail())
                        ->from(new Address('hello@rebel-refine.pro', 'Belle Maison'))
                        ->to((string) $user->getEmail())
                        ->subject($translator->trans('auth.email.verify.pro_subject'))
                        ->htmlTemplate('emails/verify_email.html.twig')
                        ->context([
                            'user' => $user,
                        ])
                );

                $this->addFlash('success', $translator->trans('auth.flash.pro_registered_check_email'));

                return $this->redirectToRoute('app_login_pro', [
                    '_locale' => $request->getLocale(),
                ]);
            }
        }

        return $this->render('pro/register.html.twig', [
            'page_title' => 'Inscription professionnelle — Belle Maison',
            'registrationForm' => $form->createView(),
        ]);
    }
}
