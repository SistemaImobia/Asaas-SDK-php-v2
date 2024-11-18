<?php

namespace Imobia\Asaas\Api;

use Imobia\Asaas\Entity\Bill as BillEntity;

/**
 * Abstract API
 *
 * @author Mateus Belli <mateusbelli@hotmail.com>
 */
class Bill extends AbstractApi
{
    /**
     * Get all bills
     *
     * @param   string  $id  Bill Id
     * @return  BillEntity
     */
    public function getAll(array $data = [])
    {
        if (!isset($data['limit'])) {
            $data['limit']  = static::DEFAULT_LIMIT;
            $data['offset'] = 0;
        }

        $bills     = $this->adapter->get(sprintf('%s/bill?%s', $this->endpoint, http_build_query($data)));
        $bills     = json_decode($bills);
        $meta      = $this->extractMeta($bills);
        $billsData = $bills->data;

        while ($meta->hasMore) {
            $data['offset'] += $data['offset'] > 0 ? $data['limit'] : $data['limit'] + 1;
            $bills     = $this->adapter->get(sprintf('%s/bill?%s', $this->endpoint, http_build_query($data)));
            $bills     = json_decode($bills);
            $meta      = $this->extractMeta($bills);
            $billsData = array_merge($billsData, $bills->data);
        }

        return array_map(function ($bills) {
            return new BillEntity($bills);
        }, $billsData);
    }

    /**
     * Pay bill
     *
     * @param   string  $id  Bill Id
     * @return  BillEntity
     */
    public function create(array $data = [])
    {
        $bill = $this->adapter->post(sprintf('%s/bill', $this->endpoint), $data);

        $bill = json_decode($bill);

        return new BillEntity($bill);
    }

    /**
     * Simulate Bill payment
     *
     * @param   string  $id  Bill Id
     * @return  BillEntity
     */
    public function simulate(array $data = [])
    {
        $bill = $this->adapter->post(sprintf('%s/bill/simulate', $this->endpoint), $data);

        $bill = json_decode($bill);

        // Simulate endpoint return response different, so we have to format
        // these values to the usual format
        $return                      = $bill->bankSlipInfo;
        $return->fee                 = $bill->fee;
        $return->minimumScheduleDate = $bill->minimumScheduleDate;

        return new BillEntity($bill);
    }

    /**
     * Get Bill By Id
     *
     * @param   string  $id  Bill Id
     * @return  BillEntity
     */
    public function getById($id)
    {
        $payment = $this->adapter->get(sprintf('%s/bill/%s', $this->endpoint, $id));

        $payment = json_decode($payment);

        return new BillEntity($payment);
    }

    /**
     * Cancel bill
     *
     * @param   string  $id  Bill Id
     * @return  BillEntity
     */
    public function cancel($id)
    {
        $payment = $this->adapter->post(sprintf('%s/bill/%s/cancel', $this->endpoint, $id));

        $payment = json_decode($payment);

        return new BillEntity($payment);
    }
}
