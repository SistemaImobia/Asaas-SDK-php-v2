<?php
namespace Imobia\Asaas\Entity;

/**
 * Payment Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Payment extends \Imobia\Asaas\Entity\AbstractEntity
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $customer;

    /**
     * @var string
     */
    public $subscription;

    /**
     * @var string (BOLETO|CREDIT_CARD|UNDEFINED)
     */
    public $billingType;

    /**
     * @var float
     */
    public $value;

    /**
     * @var float
     */
    public $netValue;

    /**
     * @var float
     */
    public $originalValue;

    /**
     * @var float
     */
    public $interestValue;

    /**
     * @var string
     */
    public $dueDate;

    /**
     * @var string
     */
    public $originalDueDate;

    /**
     * @var string
     */
    public $paymentDate;

    /**
     * @var string
     */
    public $dateCreated;

    /**
     * @var string
     */
    public $creditDate;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $invoiceNumber;

    /**
     * @var string
     */
    public $invoiceUrl;

    /**
     * @var string
     */
    public $bankSlipUrl;

    /**
     * @var int
     */
    public $installmentCount;

    /**
     * @var float
     */
    public $installmentValue;

    /**
     * @var array
     * [holderName, number, expiryMonth, expiryYear, ccv]
     */
    public $creditCard;

    /**
     * @var array
     * [name, email, cpfCnpj, postalCode,
     *  addressNumber, addressComplement,
     *  phone, mobilePhone]
     */
    public $creditCardHolderInfo;

    /**
     * @var array
     * [value, dueDateLimitDays, type (FIXED, PERCENTAGE)]
     */
    public $discount;

    /**
     * @var array
     * [value (percentual ao mes)]
     */
    public $interest;

    /**
     * @var array
     * [value (percentual)]
     */
    public $fine;

    /**
     * @var array
     * [walletId, fixedValue, percentualValue]
     */
    public $split;

    /**
     * @var boolean
     */
    public $postalService;
}
