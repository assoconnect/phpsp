<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Wallet;

use AssoConnect\PHPDate\AbsoluteDate;
use AssoConnect\PHPSP\DataInterface\BankAccount\PspBankAccountInterface;
use AssoConnect\PHPSP\DataInterface\Kyc\PspKycStatusInterface;
use AssoConnect\PHPSP\DataInterface\PspIdentifierAwareInterface;
use Doctrine\Common\Collections\Collection;

interface PspWalletInterface extends PspKycStatusInterface, PspIdentifierAwareInterface
{
    public const TYPE_INDIVIDUAL = 'INDIVIDUAL';
    public const TYPE_BUSINESS   = 'BUSINESS';
    public const TYPE_NON_PROFIT = 'NON PROFIT';

    /**
     * Initial status, still unknown from the PSP.
     */
    public const PSP_LIFECYCLE_STATUS_NEW = 'NEW';

    /**
     * An entity creation request has been sent to the PSP and resulted in no error.
     */
    public const PSP_LIFECYCLE_STATUS_PENDING = 'PENDING';

    /**
     * The PSP notified that the entity was successfully created.
     */
    public const PSP_LIFECYCLE_STATUS_VALID = 'VALID';

    /**
     * The entity was closed.
     */
    public const PSP_LIFECYCLE_STATUS_CLOSED = 'CLOSED';

    /**
     * The PSP notified that the entity could not be created.
     */
    public const PSP_LIFECYCLE_STATUS_ERROR = 'ERROR';

    /**
     * Object is pending manual review from the PSP
     */
    public const PSP_LIFECYCLE_STATUS_FROZEN = 'FROZEN';


    public const PSP_ALL_LIFECYCLE_STATUSES = [
        self::PSP_LIFECYCLE_STATUS_NEW,
        self::PSP_LIFECYCLE_STATUS_PENDING,
        self::PSP_LIFECYCLE_STATUS_VALID,
        self::PSP_LIFECYCLE_STATUS_CLOSED,
        self::PSP_LIFECYCLE_STATUS_ERROR,
        self::PSP_LIFECYCLE_STATUS_FROZEN,
    ];

    public const NOMINAL_STATUSES = [
        self::PSP_LIFECYCLE_STATUS_NEW,
        self::PSP_LIFECYCLE_STATUS_PENDING,
        self::PSP_LIFECYCLE_STATUS_VALID,
    ];

    public function getAppId(): ?string;

    public function getPspId(): ?string;

    public function getType(): ?string;

    public function getPspLifecycleStatus(): string;

    public function setAppId(string $pspId): self;

    public function setPspId(string $pspId): self;

    public function setPspName(string $psp): self;

    public function setPspLifecycleStatus(string $pspLifecycleStatus);

    public function getPspSubWallets(): Collection;

    public function addPspSubWallet(PspSubWalletInterface $pspSubWallet): self;

    public function removePspSubWallet(PspSubWalletInterface $pspSubWallet): self;

    public function getPspBankAccounts(): Collection;

    public function addPspBankAccount(PspBankAccountInterface $pspBankAccount): self;

    public function removePspBankAccount(PspBankAccountInterface $pspBankAccount): self;

    public function block(AbsoluteDate $blockedAt): self;
}
