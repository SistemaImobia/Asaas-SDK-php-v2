<?php
namespace Imobia\Asaas\Api;

use Imobia\Asaas\Entity\BankAccount as BankAccountEntity;

/**
 * BankAccount API Endpoint
 *
 * @author David Berri <dwbwill@gmail.com>
 */
class BankAccount extends \Imobia\Asaas\Api\AbstractApi
{
    public function getAll()
    {
        $balance = $this->adapter->get(sprintf('%s/bankAccounts/mainAccount', $this->endpoint));

        return new BankAccountEntity(json_decode($balance));
    }

    public function getAllAccounts($filters = [])
    {
        if (!isset($filters['limit'])) {
            $filters['limit']  = static::DEFAULT_LIMIT;
            $filters['offset'] = 0;
        }

        $balance = $this->adapter->get(sprintf('%s/bankAccounts?%s', $this->endpoint, http_build_query($filters)));

        $balance = json_decode($balance);

        $meta = $this->extractMeta($balance);

        $balanceData = $balance->data;

        while ($meta->hasMore) {
            $filters['offset'] += $filters['limit'];
            $balance     = $this->adapter->get(sprintf('%s/bankAccounts?%s', $this->endpoint, http_build_query($filters)));
            $balance     = json_decode($balance);
            $meta        = $this->extractMeta($balance);
            $balanceData = array_merge($balanceData, $balance->data);
        }

        return array_map(function ($payment) {
            return new BankAccountEntity($payment);
        }, $balanceData);

        return new BankAccountEntity(json_decode($balance));
    }

    /**
     * Creates new BankAccount
     *
     * @param   array  $data  BankAccount Data
     * @return  BankAccountEntity
     */
    public function create(array $data)
    {
        $bankAccount = $this->adapter->post(sprintf('%s/bankAccounts/mainAccount', $this->endpoint), $data);

        $bankAccount = json_decode($bankAccount);

        return new BankAccountEntity($bankAccount);
    }

    /**
     * Delete a BankAccount
     *
     * @param   array  $data  BankAccount Data
     * @return  BankAccountEntity
     */
    public function delete($id)
    {
        $bankAccount = $this->adapter->delete(sprintf('%s/bankAccounts?id=%s', $this->endpoint, $id));

        $bankAccount = json_decode($bankAccount);

        return new BankAccountEntity($bankAccount);
    }
}
