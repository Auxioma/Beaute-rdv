<?php

namespace App\Service;

use App\Entity\Auth\User;
use App\Entity\Client\ClientProfile;
use App\Entity\Notification\NotificationPreference;
use App\Entity\Professional\ProfessionalAccount;
use App\Form\Model\RegisterProData;
use App\Form\Model\RegisterUserData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class RegistrationManager
{
    private const DEFAULT_COUNTRY_CODE = 'FR';
    private const DEFAULT_TIMEZONE = 'Europe/Paris';

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly UserPasswordHasherInterface $passwordHasher,
        private readonly PublicIdGenerator $publicIdGenerator,
    ) {
    }

    public function registerClient(RegisterUserData $data, string $locale): User
    {
        $user = (new User())
            ->setPublicId($this->publicIdGenerator->generate())
            ->setEmail((string) $data->email)
            ->setFirstname($data->firstname)
            ->setLastname($data->lastname)
            ->setType(User::TYPE_CLIENT)
            ->setLocale($this->normalizeLocale($locale))
            ->setCountryCode(self::DEFAULT_COUNTRY_CODE)
            ->setTimezone(self::DEFAULT_TIMEZONE)
            ->setRoles(['ROLE_USER'])
            ->setIsVerified(false)
            ->setIsPhoneVerified(false)
            ->setIsActive(true);

        $user->setPassword($this->passwordHasher->hashPassword($user, (string) $data->plainPassword));

        $clientProfile = (new ClientProfile())
            ->setUser($user)
            ->setDefaultCity($data->defaultCity)
            ->setMarketingEmailConsent($data->marketingEmailConsent)
            ->setMarketingSmsConsent(false)
            ->setPhotoConsent(false);

        $notificationPreference = (new NotificationPreference())
            ->setUser($user)
            ->setAppointmentEmail(true)
            ->setAppointmentSms(true)
            ->setMarketingEmail($data->marketingEmailConsent)
            ->setMarketingSms(false)
            ->setProDailyDigest(false);

        $this->entityManager->persist($user);
        $this->entityManager->persist($clientProfile);
        $this->entityManager->persist($notificationPreference);
        $this->entityManager->flush();

        return $user;
    }

    public function registerProfessional(RegisterProData $data, string $locale): User
    {
        $user = (new User())
            ->setPublicId($this->publicIdGenerator->generate())
            ->setEmail((string) $data->email)
            ->setPhone($data->phone)
            ->setFirstname($data->firstname)
            ->setLastname($data->lastname)
            ->setType(User::TYPE_PRO)
            ->setLocale($this->normalizeLocale($locale))
            ->setCountryCode(self::DEFAULT_COUNTRY_CODE)
            ->setTimezone(self::DEFAULT_TIMEZONE)
            ->setRoles(['ROLE_USER', 'ROLE_PRO'])
            ->setIsVerified(false)
            ->setIsPhoneVerified(false)
            ->setIsActive(true);

        $user->setPassword($this->passwordHasher->hashPassword($user, (string) $data->plainPassword));

        $professionalAccount = (new ProfessionalAccount())
            ->setOwner($user)
            ->setLegalName($data->establishmentName)
            ->setBillingEmail((string) $data->email)
            ->setBillingPhone($data->phone)
            ->setBillingCountryCode(self::DEFAULT_COUNTRY_CODE)
            ->setOnboardingStatus('draft');

        $notificationPreference = (new NotificationPreference())
            ->setUser($user)
            ->setAppointmentEmail(true)
            ->setAppointmentSms(true)
            ->setMarketingEmail(false)
            ->setMarketingSms(false)
            ->setProDailyDigest(true);

        $this->entityManager->persist($user);
        $this->entityManager->persist($professionalAccount);
        $this->entityManager->persist($notificationPreference);
        $this->entityManager->flush();

        return $user;
    }

    private function normalizeLocale(string $locale): string
    {
        $normalizedLocale = strtolower(trim($locale));

        return '' !== $normalizedLocale ? substr($normalizedLocale, 0, 10) : 'fr';
    }
}
