<?php
namespace Imobia\Asaas;

use Imobia\Asaas\Adapter\AdapterInterface;

/**
 * Asass API Wrapper
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 * @author Mateus Belli <mateusbelli@hotmail.com>
 * @author Marcelo Migliorini <celo_mig@hotmail.com>
 */
class Asaas
{
    /**
     * Adapter Interface
     *
     * @var  AdapterInterface
     */
    protected $adapter;

    /**
     * Ambiente da API
     *
     * @var  string
     */
    protected $ambiente;

    /**
     * Versão da API
     *
     * @var  string
     */
    protected $versao;

    /**
     * Constructor
     *
     * @param  AdapterInterface  $adapter   Adapter Instance
     * @param  string            $ambiente  (optional) Ambiente da API
     */
    public function __construct(AdapterInterface $adapter, $ambiente = 'producao', $versao = 'v3')
    {
        $this->adapter  = $adapter;
        $this->ambiente = $ambiente;
        $this->versao   = $versao;
    }

    /**
     * Get customer endpoint
     *
     * @return  Customer
     */
    public function customer()
    {
        return new \Imobia\Asaas\Api\Customer($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get subscription endpoint
     *
     * @return  Subscription
     */
    public function subscription()
    {
        return new \Imobia\Asaas\Api\Subscription($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get payment endpoint
     *
     * @return  Payment
     */
    public function payment()
    {
        return new \Imobia\Asaas\Api\Payment($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get Notification API Endpoint
     *
     * @return  Notification
     */
    public function notification()
    {
        return new \Imobia\Asaas\Api\Notification($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get transfer endpoint
     *
     * @return  Transfer
     */
    public function transfer()
    {
        return new \Imobia\Asaas\Api\Transfer($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get Account endpoint
     *
     * @return  Account
     */
    public function account()
    {
        return new \Imobia\Asaas\Api\Account($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get Document endpoint
     *
     * @return  Document
     */
    public function document()
    {
        return new \Imobia\Asaas\Api\Document($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get Invoice endpoint
     *
     * @return  Invoice
     */
    public function invoice()
    {
        return new \Imobia\Asaas\Api\Invoice($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get customer fiscal info endpoint
     *
     * @return  CustomerFiscalInfo
     */
    public function customerFiscalInfo()
    {
        return new \Imobia\Asaas\Api\CustomerFiscalInfo($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get bank endpoint
     *
     * @return  Bank
     */
    public function bank()
    {
        return new \Imobia\Asaas\Api\Bank($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get bank account endpoint
     *
     * @return  BankAccount
     */
    public function bankAccount()
    {
        return new \Imobia\Asaas\Api\BankAccount($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get balance endpoint
     *
     * @return  Balance
     */
    public function balance()
    {
        return new \Imobia\Asaas\Api\Balance($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get webhook endpoint
     *
     * @return  Webhook
     */
    public function webhook()
    {
        return new \Imobia\Asaas\Api\Webhook($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get webhooks endpoint
     * 
     * Asaas modificou o funcionamento, adicionando novo formato de cadastro de webhooks, onde é passado quais os eventos desejamos receber
     * 
     * Como há o uso do antigo, foi apenas adicionado o novo. A principal diferença está na chamada, os novos endepoints estão no plural webhookS
     *
     * @return  Webhooks
     */
    public function webhooks()
    {
        return new \Imobia\Asaas\Api\Webhooks($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get wallets endpoint
     *
     * @return  Wallet
     */
    public function wallet()
    {
        return new \Imobia\Asaas\Api\Wallet($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get FinancialTransaction endpoint
     *
     * @return  FinancialTransaction
     */
    public function extrato()
    {
        return new \Imobia\Asaas\Api\FinancialTransaction($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get MyAccount endpoint
     */
    public function myAccount()
    {
        return new \Imobia\Asaas\Api\MyAccount($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Get Customization endpoint
     */
    public function customization()
    {
        return new \Imobia\Asaas\Api\Customization($this->adapter, $this->ambiente, $this->versao);
    }

    /**
     * Ger Bill endpoint
     */
    public function bill()
    {
        return new \Imobia\Asaas\Api\Bill($this->adapter, $this->ambiente, $this->versao);
    }

    public function pix()
    {
        return new \Imobia\Asaas\Api\Pix($this->adapter, $this->ambiente, $this->versao);
    }

    public function commercialInfo()
    {
        return new \Imobia\Asaas\Api\CommercialInfo($this->adapter, $this->ambiente, $this->versao);
    }
}
