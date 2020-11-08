<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\BankAccount;

interface PspBankAccountAwareInterface
{
    public function getPspBankAccount(): ?PspBankAccountInterface;
}
