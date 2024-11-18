<?php

namespace Imobia\Asaas\Entity;

/**
 * Invoice Entity
 *
 * @author David Berri <dwbwill@gmail.com>
 */
final class Invoice extends \Imobia\Asaas\Entity\AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string SCHEDULED|AUTHORIZED|PROCESSING_CANCELLATION|CANCELED|CANCELLATION_DENIED|ERROR
     */
    public $status;

    /**
     * @var string
     */
    public $customer;

    /**
     * @var string
     */
    public $payment;

    /**
     * @var string
     */
    public $installment;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $statusDescription;

    /**
     * @var string
     */
    public $serviceDescription;

    /**
     * @var string
     */
    public $pdfUrl;

    /**
     * @var string
     */
    public $xmlUrl;

    /**
     * @var string
     */
    public $rpsSerie;

    /**
     * @var string
     */
    public $rpsNumber;

    /**
     * @var string
     */
    public $number;

    /**
     * @var string
     */
    public $validationCode;

    /**
     * @var number
     */
    public $value;

    /**
     * @var number
     */
    public $deductions;

    /**
     * @var string
     */
    public $effectiveDate;

    /**
     * @var string
     */
    public $observations;

    /**
     * @var string
     */
    public $estimatedTaxesDescription;

    /**
     * @var string
     */
    public $municipalServiceId;

    /**
     * @var string
     */
    public $municipalServiceCode;

    /**
     * @var string
     */
    public $municipalServiceName;

    /**
     * @var object
     */
    public $taxes;
}
