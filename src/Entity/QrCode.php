<?php
namespace Imobia\Asaas\Entity;

/**
 * Base Meta Entity
 *
 * @author Marcelo Migliorini <celo_mig@hotmail.com>
 */
final class QrCode extends \Imobia\Asaas\Entity\AbstractEntity
{
    /**
     * @var string|null Identificador único do QR Code
     */
    public $id;

    /**
     * @var string|null 
     */
    public $payload;

    /**
     * @var mixed|null Identificador de ponta a ponta
     */
    public $endToEndIdentifier;

    /**
     * @var mixed|null Finalidade do QR Code
     */
    public $finality;

    /**
     * @var int|null Valor do QR Code
     */
    public $value;

    /**
     * @var mixed|null Valor de troco
     */
    public $changeValue;

    /**
     * @var int|null Valor reembolsado
     */
    public $refundedValue;

    /**
     * @var string|null Data efetiva do QR Code
     */
    public $effectiveDate;

    /**
     * @var string|null Data agendada do QR Code
     */
    public $scheduledDate;

    /**
     * @var string|null Status do QR Code
     */
    public $status;

    /**
     * @var string|null Tipo do QR Code (DEBIT ou outro)
     */
    public $type;

    /**
     * @var string|null Tipo de origem do QR Code (DYNAMIC_QRCODE ou outro)
     */
    public $originType;

    /**
     * @var string|null Descrição do QR Code
     */
    public $description;

    /**
     * @var mixed|null URL do recibo da transação
     */
    public $transactionReceiptUrl;

    /**
     * @var mixed|null Motivo de recusa
     */
    public $refusalReason;

    /**
     * @var bool|null Indica se o QR Code pode ser cancelado
     */
    public $canBeCanceled;

    /**
     * @var mixed|null Transação original associada ao QR Code
     */
    public $originalTransaction;

    /**
     * @var array|null Conta externa associada ao QR Code
     */
    public $externalAccount;

    /**
     * @var array|null Informações específicas do QR Code
     */
    public $qrCode;

    /**
     * @var mixed|null Método de pagamento associado ao QR Code
     */
    public $payment;

    /**
     * @var bool|null Indica se o QR Code pode ser reembolsado
     */
    public $canBeRefunded;

    /**
     * @var mixed|null Motivo de desabilitação do reembolso
     */
    public $refundDisabledReason;

    /**
     * @var float|null Valor da taxa cobrada
     */
    public $chargedFeeValue;

    /**
     * @var string|null Data de criação do QR Code
     */
    public $dateCreated;

    /**
     * @var mixed|null Chave de endereço
     */
    public $addressKey;

    /**
     * @var mixed|null Tipo de chave de endereço
     */
    public $addressKeyType;

    /**
     * @var mixed|null ID de transferência
     */
    public $transferId;

    /**
     * @var mixed|null Referência externa associada ao QR Code
     */
    public $externalReference;

    // Novos campos adicionados com base no segundo retorno

    /**
     * @var string|null Chave PIX associada ao QR Code
     */
    public $pixKey;

    /**
     * @var string|null Identificador de conciliação
     */
    public $conciliationIdentifier;

    /**
     * @var string|null Tipo de transação do QR Code
     */
    public $transactionOriginType;

    /**
     * @var string|null Data de vencimento do QR Code
     */
    public $dueDate;

    /**
     * @var string|null Data de expiração do QR Code
     */
    public $expirationDate;

    /**
     * @var int|null Valor de juros
     */
    public $interest;

    /**
     * @var int|null Valor de multa
     */
    public $fine;

    /**
     * @var int|null Valor de desconto
     */
    public $discount;

    /**
     * @var int|null Valor total do QR Code
     */
    public $totalValue;

    /**
     * @var bool|null Indica se o QR Code pode ser pago com valor diferente
     */
    public $canBePaidWithDifferentValue;

    /**
     * @var bool|null Indica se o valor de troco pode ser modificado
     */
    public $canBeModifyChangeValue;

    /**
     * @var array|null Informações do recebedor
     */
    public $receiver;

    /**
     * @var array|null Informações do pagador
     */
    public $payer;

    /**
     * @var bool|null Indica se o QR Code pode ser pago
     */
    public $canBePaid;

    /**
     * @var mixed|null Motivo pelo qual o QR Code não pode ser pago
     */
    public $cannotBePaidReason;
}


