<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Wallet;

/**
 * Base interface allowing to get the legal information from a PSP wallet
 */
interface PspBusinessLegalDataInterface
{
    /**
     * Returns the legal name of a business from a PSP wallet
     */
    public function getName(): ?string;
}
