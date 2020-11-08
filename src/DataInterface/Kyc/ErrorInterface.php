<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Kyc;

interface ErrorInterface
{
    public function getCode(): int;

    public function getMessage(): string;
}
