<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface;

/**
 * Interface to be implemented by interfaces with a reference to the PSP's name like PspWalletInterface
 */
interface PspIdentifierAwareInterface
{
    /**
     * Returns the name of the PSP related to the current instance
     *
     * @return string
     */
    public function getPspName(): string;
}
