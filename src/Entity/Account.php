<?php

namespace Imobia\Asaas\Entity;

/**
 * Account Entity
 *
 * @author David Berri <dwbwill@gmail.com>
 */
final class Account extends \Imobia\Asaas\Entity\AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $cpfCnpj;

    /**
     * @var string (FISICA|JURIDICA)
     */
    public $personType;

    /**
     * @var string
     */
    public $companyType;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $mobilePhone;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $addressNumber;

    /**
     * @var string
     */
    public $complement;

    /**
     * @var string
     */
    public $province;

    /**
     * @var string
     */
    public $postalCode;

    /**
     * @var string
     */
    public $apiKey;

    /**
     * @var string
     */
    public $walletId;
}
