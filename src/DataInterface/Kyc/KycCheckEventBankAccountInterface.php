<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Kyc;

use AssoConnect\PHPSP\DataInterface\BankAccount\PspBankAccountInterface;

interface KycCheckEventBankAccountInterface extends KycCheckEventInterface
{
    public function getPspBankAccount(): PspBankAccountInterface;
}
