<?php
namespace Imobia\Asaas\Entity;

/**
 * Subscription Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Subscription extends \Imobia\Asaas\Entity\AbstractEntity
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
     * @var float
     */
    public $value;

    /**
     * @var string
     */
    public $nextDueDate;

    /**
     * @var string
     */
    public $cycle;

    /**
     * @var string
     */
    public $billingType;

    /**
     * @var string
     */
    public $description;

    /**
     * @var bool
     */
    public $updatePendingPayments;

    /**
     * @var array
     */
    public $payments = [];

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
     * @var int
     */
    public $maxPayments;

    /**
     * @var string
     */
    public $endDate;

    /**
     * @param  string  $nextDueDate
     */
    public function setNextDueDate($nextDueDate)
    {
        $this->nextDueDate = static::convertDateTime($nextDueDate);
    }

    /**
     * @param  string  $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = static::convertDateTime($endDate);
    }
}
