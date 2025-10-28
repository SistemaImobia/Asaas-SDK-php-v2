<?php
namespace Imobia\Asaas\Api;

use Imobia\Asaas\Entity\Bank as BankEntity;

/**
 * Bank API Endpoint
 *
 * @author Mateus Belli <mateusbelli@hotmail.com>
 */
class Bank extends \Imobia\Asaas\Api\AbstractApi
{
    public function getAll()
    {
        $banks = $this->adapter->get(sprintf('%s/banks', $this->endpoint));

        $banks = json_decode($banks);

        $this->extractMeta($banks);

        return array_map(function($banks)
        {
            return new BankEntity($banks);
        }, $banks->data);
    }
}
