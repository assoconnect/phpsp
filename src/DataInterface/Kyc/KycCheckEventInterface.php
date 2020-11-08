<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Kyc;

use AssoConnect\PHPSP\DataInterface\Wallet\PspWalletAwareInterface;

interface KycCheckEventInterface extends PspWalletAwareInterface
{
    public function getType(): string;

    public function getKycStatus(): string;

    public function getPspStatus(): ?string;

    public function getKycCheckError(): ?ErrorInterface;
}
