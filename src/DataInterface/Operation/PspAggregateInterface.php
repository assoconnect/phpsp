<?php

declare(strict_types=1);

namespace AssoConnect\PHPSP\DataInterface\Operation;

use AssoConnect\PHPSP\Exception\MultipleCurrenciesOnPspAggregateException;
use AssoConnect\PHPSP\DataInterface\PspIdentifierAwareInterface;
use Doctrine\Common\Collections\Collection;
use Money\Currency;
use Money\Money;

/**
 * Psp Aggregate
 * One aggregate references each transaction operation requested to PSP.
 * One aggregate has multiple PspTransaction, each corresponding to a single beneficiary.
 *
 * A PspAggregate may have a related PspCapturedCard in case of server-to-server payments or if the card is captured
 * during a web payment.
 */
interface PspAggregateInterface extends PspIdentifierAwareInterface
{
    /**
     * Initial PspAggregate status.
     * old_status = 0
     */
    public const STATUS_NEW = 'NEW';

    /**
     * The transaction is approved by the financial institution. The request for transferring the funds has been sent
     * by the PSP to the financial institution.
     * old_status = 1
     */
    public const STATUS_AUTHORIZED = 'AUTHORIZED';

    /**
     * The transaction was declined by the financial institution. This status can also result from a PSP fraud score
     * being too high.
     * old_status = 2
     */
    public const STATUS_REFUSED = 'REFUSED';

    /**
     * A transaction attempt was validated and received correctly, but an error occurred while communicating with the
     * financial institution.
     * old_status = 3
     */
    public const STATUS_ERROR = 'ERROR';

    /**
     * The financial institution has transferred the funds from/to the PSP.
     * old_status = 4
     */
    public const STATUS_SETTLED = 'SETTLED';

    /**
     * Two cases:
     * - The transaction does not exist in the PSP platform, so we do not know its current status
     * - The status returned by the PSP is not mapped in the code, so we don't know it.
     * old_status = 5
     */
    public const STATUS_UNKNOWN = 'UNKNOWN';

    /**
     * A transaction request was sent to the PSP. This status should only be used with PSP which use asynchronous
     * notifications.
     * old_status = 6
     */
    public const STATUS_REQUESTED = 'REQUESTED';

    /**
     * The user did not go until the end of the transaction.
     * Then the transaction is aborted thanks to a cron: "inc.abort.php"
     * old_status = 8
     */
    public const STATUS_ABORTED = 'ABORTED';

    public const METHOD_CARD = 'card';
    public const METHOD_SEPA = 'sepa';
    public const METHOD_CARD_AMERICAN_EXPRESS = 'amex';
    public const METHOD_CARD_MASTER_CARD      = 'master card';
    public const METHOD_CARD_VISA             = 'visa';
    public const METHOD_CARD_CARTE_BANCAIRE   = "carte bancaire";
    public const METHOD_CARD_TRANSFER         = 'transfer';

    /**
     * Payment action from user to PSP subwallet.
     */
    public const ACTION_PAYMENT = 'PAYMENT';

    /**
     * Payout action allowing user to withdrawl funds from his PSP subwallet.
     */
    public const ACTION_PAYOUT = 'PAYOUT';

    /**
     * Refund of payment from PSP subwallet to user payment method.
     */
    public const ACTION_REFUND = 'REFUND';

    public function getAppId(): ?string;

    public function getAction(): ?string;

    /**
     * Return the currency of the transactions in this aggregate.
     *
     * @throws MultipleCurrenciesOnPspAggregateException
     */
    public function getCurrency(): ?Currency;

    public function getMethod(): ?string;

    public function getPspId(): ?string;

    public function getStatus(): string;

    /**
     * Return the sum of the amounts of the transactions in this aggregate.
     */
    public function getTotalAmount(): Money;

    public function setAction(string $action): self;

    public function setMethod(?string $method): self;

    public function setPspId(?string $pspId): self;

    public function setPspName(string $pspName): self;

    public function setStatus(string $status): self;

    /**
     * @return Collection|PspTransactionInterface[]
     */
    public function getPspTransactions(): ?Collection;

    /**
     * Returns the related, if any, PspCapturedCard
     */
    public function getPspCapturedCard(): ?PspCapturedCardInterface;

    /**
     * returns the date on which the aggregate has been settled
     */
    public function getSettledAt(): ?\DateTimeInterface;
}
