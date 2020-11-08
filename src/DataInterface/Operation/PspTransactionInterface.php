<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Operation;

use AssoConnect\PHPSP\DataInterface\Wallet\PspSubWalletInterface;
use Money\Money;

interface PspTransactionInterface
{
    /**
     * Represents PSP transaction reference in app referential.
     */
    public function getAppId(): ?string;

    /**
     * Represents PSP transaction reference in PSP referential
     * Optional
     */
    public function getPspId(): ?string;
    public function setPspId(?string $pspId): self;


    public function getAmountMoney(): Money;
    public function setAmount(Money $amount): self;

    /**
     * Represents transaction beneficiary in PSP referential.
     */
    public function getPspSubWalletDestination(): ?PspSubWalletInterface;

    /**
     * Represents transaction remitter in PSP referential.
     */
    public function getPspSubWalletOrigin(): ?PspSubWalletInterface;

    /**
     * Aggregate multiple PspTransactions under a common operation
     */
    public function getPspAggregate(): ?PspAggregateInterface;
}
