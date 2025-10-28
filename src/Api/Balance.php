<?php
namespace Imobia\Asaas\Api;

/**
 * Balance API Endpoint
 *
 * @author David Berri <dwbwill@gmail.com>
 */
class Balance extends \Imobia\Asaas\Api\AbstractApi
{
    public function getAll()
    {
        $balance = $this->adapter->get(sprintf('%s/finance/getCurrentBalance', $this->endpoint));

        return json_decode($balance);
    }
}
