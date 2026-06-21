<?php

namespace App\Form\Model;

final class RegisterUserData
{
    public ?string $firstname = null;

    public ?string $lastname = null;

    public ?string $email = null;

    public ?string $plainPassword = null;

    public ?string $defaultCity = null;

    public bool $marketingEmailConsent = false;

    public bool $agreeTerms = false;
}
