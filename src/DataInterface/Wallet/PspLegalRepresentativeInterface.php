<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Wallet;

use AssoConnect\PHPDate\AbsoluteDate;

/**
 * Interface allowing to get the legal information from the legal representative of a PSP wallet
 */
interface PspLegalRepresentativeInterface
{
    public const GENDER_FEMALE  = 'female';

    public const GENDER_MALE    = 'male';

    public const GENDER_UNKNOWN = 'unknown';

    /**
     * Returns the Address from a legal representative of a PSP wallet
     */
    public function getAddress(): ?AddressInterface;

    /**
     * Returns the gender from a legal representative of a PSP wallet
     */
    public function getGender(): ?string;

    /**
     * Returns the birth date from a legal representative of a PSP wallet
     */
    public function getBirthDate(): ?AbsoluteDate;

    /**
     * Returns the first name from a legal representative of a PSP wallet
     */
    public function getFirstName(): ?string;

    /**
     * Returns the last name from a legal representative of a PSP wallet
     */
    public function getLastName(): ?string;

    /**
     * Returns the email from a legal representative of a PSP wallet
     */
    public function getEmail(): ?string;
}
