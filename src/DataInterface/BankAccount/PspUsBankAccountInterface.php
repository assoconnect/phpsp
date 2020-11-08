<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\BankAccount;

/**
 * Interface for United States bank accounts identified with a branch code and an account number
 */
interface PspUsBankAccountInterface extends PspBankAccountInterface
{
    public function getBranchCode(): string;

    public function getAccountType(): string;

    public function getAccountNumber(): string;

    /** BankAccount's owner address */

    public function getStateOrProvince(): ?string;

    public function getStreet(): ?string;

    public function getCity(): ?string;

    public function getPostalCode(): ?string;
}
