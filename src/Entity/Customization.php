<?php

namespace Imobia\Asaas\Entity;

final class Customization extends \Imobia\Asaas\Entity\AbstractEntity
{
    /**
     * @var string
     */
    public $object;

    /**
     * @var string
     */
    public $logoBackgroundColor;

    /**
     * @var string
     */
    public $infoBackgroundColor;

    /**
     * @var string
     */
    public $fontColor;

    /**
     * @var boolean
     */
    public $enabled;

    /**
     * @var string
     */
    public $logoUrl;

    /**
     * @var string
     */
    public $observations;

    /**
     * @var string
     */
    public $status;
}