<?php
namespace Imobia\Asaas\Api;

use Imobia\Asaas\Entity\Transfer as TransferEntity;

/**
 * Transfer API Endpoint
 *
 * @author David Berri <dwbwill@gmail.com>
 */
class Transfer extends \Imobia\Asaas\Api\AbstractApi
{
    /**
     * Get all transfers
     *
     * @param   array  $filters  (optional) Filters Array
     * @return  array  Subscriptions Array
     */
    public function getAll(array $filters = [])
    {
        if (!isset($filters['limit'])) {
            $filters['limit']  = static::DEFAULT_LIMIT;
            $filters['offset'] = 0;
        }
        $transfers = $this->adapter->get(sprintf('%s/transfers?%s', $this->endpoint, http_build_query($filters)));

        $transfers = json_decode($transfers);

        $meta = $this->extractMeta($transfers);

        $transfersData = $transfers->data;

        while ($meta->hasMore) {
            $filters['offset'] += $filters['offset'] > 0 ? $filters['limit'] : $filters['limit'] + 1;
            $transfers     = $this->adapter->get(sprintf('%s/transfers?%s', $this->endpoint, http_build_query($filters)));
            $transfers     = json_decode($transfers);
            $meta          = $this->extractMeta($transfers);
            $transfersData = array_merge($transfersData, $transfers->data);
        }

        return array_map(function ($transfer) {
            return new TransferEntity($transfer);
        }, $transfersData);
    }

    /**
     * Create new transfer
     *
     * @param   array  $data  Transfer Data
     * @return  TransferEntity
     */
    public function create(array $data)
    {
        $transfer = $this->adapter->post(sprintf('%s/transfers', $this->endpoint), $data);

        $transfer = json_decode($transfer);

        return new TransferEntity($transfer);
    }

    /**
     * Get Transfer By Id
     *
     * @param   int  $id  Transfer Id
     * @return  PaymentEntity
     */
    public function getById($id)
    {
        $transfer = $this->adapter->get(sprintf('%s/transfers/%s', $this->endpoint, $id));

        $transfer = json_decode($transfer);

        return new TransferEntity($transfer);
    }
}
