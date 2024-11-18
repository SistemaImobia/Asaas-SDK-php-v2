<?php
namespace Imobia\Asaas\Entity;

/**
 * Base Meta Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Pix extends \Imobia\Asaas\Entity\AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $key;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $dateCreated;

    /**
     * @var boolean
     */
    public $canBeDeleted;

    /**
     * @var string
     */
    public $canNotBeDeletedReason;

    /**
     * @var array
     * [encodedImage, payload]
     */
    public $qrCode;

}
