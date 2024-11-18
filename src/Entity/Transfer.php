<?php
namespace Imobia\Asaas\Entity;

/**
 * Transfer Entity
 *
 * @author David Berri <dwbwill@gmail.com>
 */
final class Transfer extends \Imobia\Asaas\Entity\AbstractEntity
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $dateCreated;

    /**
     * @var float
     */
    public $value;

    /**
     * @var string
     */
    public $netValue;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $transferFee;

    /**
     * @var string
     */
    public $effectiveDate;

    /**
     * @var string
     */
    public $scheduleDate;

    /**
     * @var string
     */
    public $authorized;

    /**
     * @var string
     */
    public $failReason;

    /**
     * @var array
     * [bank: [code: ""], accountName, ownerName,
     *  ownerBirthDate, cpfCnpj, agency, account,
     *  accountDigit, bankAccountType]
     */
    public $bankAccount;

    /**
     * @var string
     */
    public $transactionReceiptUrl;

    /**
     * @var string
     */
    public $walletId;

    /**
     * @var string
     */
    public $subscription;
}
