<?php

namespace Imobia\Asaas\Entity;

/**
 * BankAccount Entity
 *
 * @author David Berri <dwbwill@gmail.com>
 */
final class BankAccount extends \Imobia\Asaas\Entity\AbstractEntity
{
    /**
     * @var string
     */
    public $accountName;

    /**
     * @var boolean
     */
    public $thirdPartyAccount;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $bank;

    /**
     * @var string
     */
    public $bankCode;

    /**
     * @var string
     */
    public $agency;

    /**
     * @var string
     */
    public $agencyDigit;

    /**
     * @var string
     */
    public $account;

    /**
     * @var string
     */
    public $accountDigit;

    /**
     * @var string
     */
    public $bankAccountType;

    /**
     * @var string
     */
    public $bankAccountInfoId;

    /**
     * @var string
     */
    public $cpfCnpj;

    /**
     * @var string
     */
    public $ownerBirthDate;

    /**
     * @var string
     */
    public $responsiblePhone;

    /**
     * @var string
     */
    public $responsibleEmail;

    /**
     * @var string
     */
    public $status;
}
