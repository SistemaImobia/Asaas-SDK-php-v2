<?php
namespace Imobia\Asaas\Api;

use Imobia\Asaas\Entity\Invoice as InvoiceEntity;

/**
 * Invoice API Endpoint
 *
 * @author David Berri <dwbwill@gmail.com>
 */
class Invoice extends \Imobia\Asaas\Api\AbstractApi
{
    /**
     * Lists invoices
     *
     * @param  array  $filters
     * @return array
     */
    public function index(array $filters = [])
    {
        $invoices = $this->adapter->get(sprintf('%s/invoices?%s', $this->endpoint, http_build_query($filters)));

        $invoices = json_decode($invoices);

        $this->extractMeta($invoices);

        return array_map(function ($invoices) {
            return new InvoiceEntity($invoices);
        }, $invoices->data);
    }

    /**
     * Schedules new invoice
     *
     * @param   array  $data  Invoice Data
     * @return  InvoiceEntity
     */
    public function create(array $data)
    {
        $invoice = $this->adapter->post(sprintf('%s/invoices', $this->endpoint), $data);

        $invoice = json_decode($invoice);

        return new InvoiceEntity($invoice);
    }

    /**
     * Gets invoice by id
     *
     * @param  string $id
     * @return array
     */
    public function getById($id)
    {
        $invoice = $this->adapter->get(sprintf('%s/invoices/%s', $this->endpoint, $id));

        $invoice = json_decode($invoice);

        return new InvoiceEntity($invoice);
    }

    /**
     * Updates invoice
     *
     * @param  array  $filters
     * @return array
     */
    public function update($id, array $data)
    {
        $invoice = $this->adapter->post(sprintf('%s/invoices/%s', $this->endpoint, $id), $data);

        $invoice = json_decode($invoice);

        return new InvoiceEntity($invoice);
    }

    /**
     * Authorizes invoice
     *
     * @param  string  $id
     * @return array
     */
    public function authorize($id)
    {
        $invoice = $this->adapter->post(sprintf('%s/invoices/%s/authorize', $this->endpoint, $id));

        $invoice = json_decode($invoice);

        return new InvoiceEntity($invoice);
    }

    /**
     * Cancels invoice
     *
     * @param  string  $id
     * @return array
     */
    public function cancel($id)
    {
        $invoice = $this->adapter->post(sprintf('%s/invoices/%s/cancel', $this->endpoint, $id));

        $invoice = json_decode($invoice);

        return new InvoiceEntity($invoice);
    }

    public function getMunicipalServices($description = '')
    {
        $municipalServices = $this->adapter->get(sprintf('%s/invoices/municipalServices?description=%s', $this->endpoint, $description));

        $municipalServices = json_decode($municipalServices);

        return $municipalServices->data;
    }
}
