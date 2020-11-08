<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Wallet;

interface PspBusinessInterface
{
    public function getAddress(): AddressInterface;

    public function getEmail(): ?string;

    public function getPhoneNumber(): ?string;

    public function getLegalData(): PspBusinessLegalDataInterface;
}
