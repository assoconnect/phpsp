<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Kyc;

interface PspKycStatusAwareInterface
{
    /** No KYC request has been submitted (old_status = 0) */
    public const KYC_STATUS_NEW = 'NEW';

    /** The KYC request has been submitted and is pending approval (old_status = 1) */
    public const KYC_STATUS_PENDING = 'PENDING';

    /** The KYC request is approved (old_status = 2)*/
    public const KYC_STATUS_VALID = 'VALID';

    /** The KYC request is refused (old_status = 3)*/
    public const KYC_STATUS_REJECTED = 'REJECTED';

    public const KYC_STATUSES = [
        self::KYC_STATUS_NEW,
        self::KYC_STATUS_PENDING,
        self::KYC_STATUS_VALID,
        self::KYC_STATUS_REJECTED
    ];

    public function getKycStatus(): string;
}
