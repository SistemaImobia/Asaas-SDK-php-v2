<?php
namespace Imobia\Asaas\Api;

use Imobia\Asaas\Entity\Webhooks as WebhooksEntity;

/**
 * Webhooks API Endpoint
 *
 * @author Marcelo Migliorini <celo_mig@hotmail.com>
 */
class Webhooks extends \Imobia\Asaas\Api\AbstractApi
{
    /**
     * Get the active Webhooks
     *
     * @return  WebhooksEntity
     */
    public function getAll()
    {
        $webhooks = $this->adapter->get(sprintf('%s/webhooks', $this->endpoint));

        $webhooks = json_decode($webhooks);

        $this->extractMeta($webhooks);

        return array_map(function ($webhooks) {
            return new WebhooksEntity($webhooks);
        }, $webhooks->data);
    }

    /**
     * Creates new Webhooks
     *
     * @param   array  $data  Webhooks Data
     * @return  WebhooksEntity
     */
    public function create(array $data)
    {
        $webhooks = $this->adapter->post(sprintf('%s/webhooks', $this->endpoint), $data);

        $webhooks = json_decode($webhooks);

        return new WebhooksEntity($webhooks);
    }

}
