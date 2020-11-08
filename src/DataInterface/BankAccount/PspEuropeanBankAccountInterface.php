<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\BankAccount;

/**
 * Interface for European bank accounts identified with an IBAN and a BIC/SWIFT code
 */
interface PspEuropeanBankAccountInterface extends PspBankAccountInterface
{
    public function getIban(): string;

    public function getBic(): string;
}
