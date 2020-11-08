<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface;

/**
 * Object synchronous lifecycle on the PSP side
 */
interface PspLifecycleAwareInterface
{
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

    public const PSP_ALL_LIFECYCLE_STATUSES = [
        self::PSP_LIFECYCLE_STATUS_NEW,
        self::PSP_LIFECYCLE_STATUS_PENDING,
        self::PSP_LIFECYCLE_STATUS_VALID,
        self::PSP_LIFECYCLE_STATUS_CLOSED,
        self::PSP_LIFECYCLE_STATUS_ERROR,
    ];

    public const NOMINAL_STATUSES = [
        self::PSP_LIFECYCLE_STATUS_NEW,
        self::PSP_LIFECYCLE_STATUS_PENDING,
        self::PSP_LIFECYCLE_STATUS_VALID,
    ];

    /**
     * Returns a app-generated string identifier of the current object
     */
    public function getAppId(): ?string;

    /**
     * Returns a PSP-generated string identifier of the current object
     */
    public function getPspId(): ?string;

    /**
     * Returns the current object's lifecycle status on the PSP side
     */
    public function getPspLifecycleStatus(): string;

    public function setPspLifecycleStatus(string $pspLifecycleStatus);
}
