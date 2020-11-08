<?php

declare(strict_types=1);

namespace App\Service\Utility\Transaction\DataInterface;

/**
 * Interface defining the methods allowing to get a Psp wallet or several data from a PSP wallet
 */
interface PspWalletDataProviderInterface
{
    public function findPspWalletByAppId(string $appId): ?PspWalletInterface;

    /**
    * Returns the business information from a PSP wallet
    */
    public function getBusiness(PspWalletInterface $pspWallet): PspBusinessInterface;

    /**
     * Returns the legal representative information from a PSP wallet
     */
    public function getLegalRepresentative(PspWalletInterface $pspWallet): PspLegalRepresentativeInterface;
}
