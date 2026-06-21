<?php

namespace App\Form\Model;

final class RegisterProData
{
    public ?string $establishmentName = null;

    public ?string $firstname = null;

    public ?string $lastname = null;

    public ?string $email = null;

    public ?string $phone = null;

    public ?string $plainPassword = null;

    public bool $agreeTerms = false;
}
