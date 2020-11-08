<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Wallet;

/**
 * Interface allowing to get the specific French legal information from a PSP wallet
 */
interface PspFrenchBusinessLegalDataInterface
{
    /**
     * Returns the NAF code of a business from a PSP wallet
     */
    public function getNafCode(): ?string;

    /**
     * Returns the SIREN code of a business from a PSP wallet
     */
    public function getSiren(): ?string;

    /**
     * Returns the RNA number of a business from a PSP wallet
     */
    public function getRna(): ?string;
}
