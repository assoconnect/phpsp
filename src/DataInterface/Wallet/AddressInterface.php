<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Wallet;

interface AddressInterface
{
    public function getCountryCode(): ?string;

    public function getStreet(): ?string;

    public function getPostalCode(): ?string;

    public function getCity(): ?string;

    public function getStateOrProvince(): ?string;
}
