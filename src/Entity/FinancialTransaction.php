<?php

namespace Imobia\Asaas\Entity;

/**
 * FinanctialTransaction Entity
 *
 * @author David Berri <dwbwill@gmail.com>
 */
final class FinancialTransaction extends \Imobia\Asaas\Entity\AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var float
     */
    public $value;

    /**
     * @var float
     */
    public $balance;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string (Y-m-d)
     */
    public $date;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $paymentId;

    /**
     * @var string
     */
    public $transferId;

    /**
     * @var string
     */
    public $antecipationId;

    /**
     * @var string
     */
    public $billId;

    /**
     * @var string
     */
    public $invoiceId;

    /**
     * @var string
     */
    public $paymentDunningId;

    /**
     * @var string
     */
    public $creditBureauReportId;
}
