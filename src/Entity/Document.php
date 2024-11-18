<?php
namespace Imobia\Asaas\Entity;

/**
 * Document Entity
 *
 * @author David Berri <dwbwill@gmail.com>
 */
final class Document extends \Imobia\Asaas\Entity\AbstractEntity
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $status;

    /**
     * @var Array
     */
    public $lastVersion;
}
