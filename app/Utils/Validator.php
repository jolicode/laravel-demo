<?php

declare(strict_types=1);

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Utils;

use App\Models\User;

use function Symfony\Component\String\u;

/**
 * This class is used to provide an example of integrating simple classes as
 * services into a Symfony application.
 * See https://symfony.com/doc/current/service_container.html#creating-configuring-services-in-the-container.
 *
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
final class Validator
{
    public function validateUsername(?string $username): ?string
    {
        if (empty($username)) {
            return 'The username can not be empty.';
        }

        if (preg_match('/^[a-z_]+$/', $username) !== 1) {
            return 'The username must contain only lowercase latin characters and underscores.';
        }

        $existingUser = User::where(['username' => $username])->first();

        if ($existingUser !== null) {
            return sprintf('There is already a user registered with the "%s" username.', $username);
        }

        return null;
    }

    public function validatePassword(?string $plainPassword): ?string
    {
        if (empty($plainPassword)) {
            return 'The password can not be empty.';
        }

        if (u($plainPassword)->trim()->length() < 6) {
            return 'The password must be at least 6 characters long.';
        }

        return null;
    }

    public function validateEmail(?string $email): ?string
    {
        if (empty($email)) {
            return 'The email can not be empty.';
        }

        if (u($email)->indexOf('@') === null) {
            return 'The email should look like a real email.';
        }

        $existingEmail = User::where(['email' => $email])->first();

        if ($existingEmail !== null) {
            return sprintf('There is already a user registered with the "%s" email.', $email);
        }

        return null;
    }

    public function validateFullName(?string $fullName): ?string
    {
        if (empty($fullName)) {
            return 'The full name can not be empty.';
        }

        return null;
    }

    public function validateUserData(string $username, string $plainPassword, string $email, string $fullName): void
    {
        // validate password and email if is not this input means interactive.
        $usernameError = $this->validateUsername($username);
        $passwordError = $this->validatePassword($plainPassword);
        $emailError = $this->validateEmail($email);
        $fullnameError = $this->validateFullName($fullName);

        if ($usernameError !== null) {
            throw new \InvalidArgumentException($usernameError);
        }

        if ($passwordError !== null) {
            throw new \InvalidArgumentException($passwordError);
        }

        if ($emailError !== null) {
            throw new \InvalidArgumentException($emailError);
        }

        if ($fullnameError !== null) {
            throw new \InvalidArgumentException($fullnameError);
        }
    }
}
