<?php
namespace Imobia\Asaas\Entity;

/**
 * Base Meta Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class CustomerFiscalInfo extends \Imobia\Asaas\Entity\AbstractEntity
{
    /**
     * @var string
     */
    public $authenticationType;

    /**
     * @var boolean
     */
    public $supportsCancellation;

    /**
     * @var boolean
     */
    public $usesSpecialTaxRegimes;

    /**
     * @var boolean
     */
    public $usesServiceListItem;

    /**
     * @var boolean
     */
    public $usesStateInscription;

    /**
     * @var boolean
     */
    public $specialTaxRegimesList;

    /**
     * @var string
     */
    public $municipalInscriptionHelp;

    /**
     * @var array
     * [encodedImage, payload]
     */
    public $specialTaxRegimeHelp;

    /**
     * @var string
     */
    public $serviceListItemHelp;

    /**
     * @var string
     */
    public $digitalCertificatedHelp;

    /**
     * @var string
     */
    public $accessTokenHelp;

    /**
     * @var string
     */
    public $municipalServiceCodeHelp;

    /**
     * @var string
     */
    public $nationalPortalTaxCalculationRegimeHelp;

    /**
     * @var array
     */
    public $nationalPortalTaxCalculationRegimeList;

}
