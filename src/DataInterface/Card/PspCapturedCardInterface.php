<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Card;

use AssoConnect\PHPDate\AbsoluteDate;
use AssoConnect\PHPSP\DataInterface\PspIdentifierAwareInterface;
use AssoConnect\PHPSP\DataInterface\PspLifecycleAwareInterface;

/**
 * This represents a captured card for server-to-server payments
 */
interface PspCapturedCardInterface extends PspIdentifierAwareInterface, PspLifecycleAwareInterface
{
    /**
     * Card's network like visa or mastercard
     */
    public function getNetwork(): ?string;

    /**
     * Card's last 4 digits
     */
    public function getHint(): ?string;

    /**
     * Last day of the Card's expiration month/year
     * The exact point in time when the card expires depends on the implementation of the card's issuer
     */
    public function getExpiresAt(): ?AbsoluteDate;

    /**
     * Updates the Card once it has been captured by the PSP
     */
    public function capture(
        string $pspId,
        string $network,
        string $hint,
        AbsoluteDate $expiresAt
    ): self;
}
