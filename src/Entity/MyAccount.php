<?php
namespace Imobia\Asaas\Entity;

/**
 * MyAccount Entity
 *
 * @author Mateus Belli <mateusbelli@hotmail.com>
 */
final class MyAccount extends \Imobia\Asaas\Entity\AbstractEntity
{
    /**
     * @var string
     */
    public $commercialInfo;

    /**
     * @var string
     */
    public $bankAccountInfo;

    /**
     * @var string
     */
    public $documentation;

    /**
     * @var string
     */
    public $general;
}
