<?php
namespace Imobia\Asaas\Api;

/**
 * Wallet API Endpoint
 *
 * @author David Berri <dwbwill@gmail.com>
 */
class Wallet extends \Imobia\Asaas\Api\AbstractApi
{
    /**
     * Get all wallets
     *
     * @param   array  $filters  (optional) Filters Array
     * @return  array  Subscriptions Array
     */
    public function getAll(array $filters = [])
    {
        $wallets = $this->adapter->get(sprintf('%s/wallets?%s', $this->endpoint, http_build_query($filters)));

        $wallets = json_decode($wallets);

        $this->extractMeta($wallets);

        return $wallets->data;
    }
}
