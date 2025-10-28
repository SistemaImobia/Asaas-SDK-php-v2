<?php
namespace Imobia\Asaas\Api;

use Imobia\Asaas\Entity\Webhook as WebhookEntity;

/**
 * Webhook API Endpoint
 *
 * @author David Berri <dwbwill@gmail.com>
 */
class Webhook extends \Imobia\Asaas\Api\AbstractApi
{
    /**
     * Get the active Webhook
     *
     * @return  WebhookEntity
     */
    public function getAll()
    {
        $webhook = $this->adapter->get(sprintf('%s/webhook', $this->endpoint));

        $webhook = json_decode($webhook);

        return new WebhookEntity($webhook);
    }

    public function getAllTransfers()
    {
        $webhook = $this->adapter->get(sprintf('%s/webhook/transfer', $this->endpoint));

        $webhook = json_decode($webhook);

        return new WebhookEntity($webhook);
    }

    public function getAllInvoices()
    {
        $webhook = $this->adapter->get(sprintf('%s/webhook/invoice', $this->endpoint));

        $webhook = json_decode($webhook);

        return new WebhookEntity($webhook);
    }

    /**
     * Creates new Webhook
     *
     * @param   array  $data  Webhook Data
     * @return  WebhookEntity
     */
    public function create(array $data)
    {
        $webhook = $this->adapter->post(sprintf('%s/webhook', $this->endpoint), $data);

        $webhook = json_decode($webhook);

        return new WebhookEntity($webhook);
    }

    public function createTransfer(array $data)
    {
        $webhook = $this->adapter->post(sprintf('%s/webhook/transfer', $this->endpoint), $data);

        $webhook = json_decode($webhook);

        return new WebhookEntity($webhook);
    }

    public function createInvoice(array $data)
    {
        $webhook = $this->adapter->post(sprintf('%s/webhook/invoice', $this->endpoint), $data);

        $webhook = json_decode($webhook);

        return new WebhookEntity($webhook);
    }
}
