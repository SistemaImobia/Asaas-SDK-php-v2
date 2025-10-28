<?php
namespace Imobia\Asaas\Entity;

/**
 * Bill Entity
 *
 * @author Mateus Belli <mateusbelli@hotmail.com>
 */
class Bill extends AbstractEntity
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string (PENDING|BANK_PROCESSING|PAID|FAILED|CANCELLED)
     */
    public $status;

    /**
     * @var float
     */
    public $value;

    /**
     * @var float
     */
    public $discount;

    /**
     * @var string
     */
    public $identificationField;

    /**
     * @var string
     */
    public $dueDate;

    /**
     * @var string
     */
    public $scheduleDate;

    /**
     * @var string
     */
    public $paymentDate;

    /**
     * @var string
     *
     */
    public $fee;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $companyName;

    /**
     * @var string
     */
    public $transactionReceiptUrl;

    /**
     * @var string
     */
    public $canBeCancelled;

    /**
     * @var string
     */
    public $failReasons;

    /**
     * @var array
     */
    public $bankSlipInfo;

    /**
     * @var array
     */
    public $minimumScheduleDate;
}
