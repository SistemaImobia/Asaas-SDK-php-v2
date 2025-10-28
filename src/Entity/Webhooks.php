<?php

namespace Imobia\Asaas\Entity;

/**
 * Webhooks Entity
 *
 * @author Marcelo Migliorini <celo_mig@hotmail.com>
 */
final class Webhooks extends \Imobia\Asaas\Entity\AbstractEntity
{

    /**
     * @var string
     */
    public $name;
    
    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $sendType;

    /**
     * @var boolean
     */
    public $enabled;

    /**
     * @var boolean
     */
    public $interrupted;

    /**
     * @var integer
     */
    public $apiVersion;

    /**
     * @var string
     */
    public $authToken;

    /**
     * @var array of strings
     */
    public $events;    
}
