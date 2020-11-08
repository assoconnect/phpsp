<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\BankAccount;

use AssoConnect\PHPSP\DataInterface\Kyc\KycCheckEventBankAccountInterface;
use AssoConnect\PHPSP\DataInterface\Kyc\PspKycStatusInterface;
use AssoConnect\PHPSP\DataInterface\PspLifecycleAwareInterface;
use AssoConnect\PHPSP\DataInterface\Wallet\PspWalletInterface;
use Money\Currency;

/**
 * Base interface for bank account
 */
interface PspBankAccountInterface extends PspLifecycleAwareInterface, PspKycStatusInterface
{
    public function getAppId(): ?string;

    public function getPspId(): ?string;

    public function getPspWallet(): PspWalletInterface;

    public function getCountryCode(): string;

    public function getCurrency(): Currency;

    public function getName(): ?string;

    public function setPspId(string $pspId): self;

    public function addKycCheckEvent(KycCheckEventBankAccountInterface $kycCheckBankAccountEvent): self;
}
