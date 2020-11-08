<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Kyc;

/**
 * KYC status on the PSP side
 */
interface PspKycStatusInterface extends PspKycStatusAwareInterface
{
    public function markKycNew();

    public function validateKyc();

    public function markKycPending();

    public function rejectKyc();
}
