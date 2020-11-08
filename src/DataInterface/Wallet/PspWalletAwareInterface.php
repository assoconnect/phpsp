<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Wallet;

interface PspWalletAwareInterface
{
    public function getPspWallet(): PspWalletInterface;
}
