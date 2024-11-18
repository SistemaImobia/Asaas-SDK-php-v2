<?php
namespace Imobia\Asaas\Api;

// Entities
use Imobia\Asaas\Entity\Pix as PixEntity;
use Imobia\Asaas\Entity\QrCode as QrCodeEntity;

/**
 * Customer API Endpoint
 *
 * @author Marcelo Migliorini <celo_mig@hotmail.com>
 */
class Pix extends \Imobia\Asaas\Api\AbstractApi
{
    /**
     * Get all Pix keys
     *
     * @param   array  $filters  Pix filters
     * @return  PixEntity
     */
    public function getAll(array $filters = [])
    {
        $chaves = $this->adapter->get(sprintf('%s/pix/addressKeys?%s', $this->endpoint, http_build_query($filters)));

        $chaves = json_decode($chaves);

        $meta = $this->extractMeta($chaves);

        $chavesData = $chaves->data;

        while ($meta->hasMore) {
            $filters['offset'] += $filters['offset'] > 0 ? $filters['limit'] : $filters['limit'] + 1;
            $chaves     = $this->adapter->get(sprintf('%s/pix/addressKeys?%s', $this->endpoint, http_build_query($filters)));
            $chaves     = json_decode($chaves);
            $meta       = $this->extractMeta($chaves);
            $chavesData = array_merge($chavesData, $chaves->data);
        }

        return array_map(function ($chave) {
            return new PixEntity($chave);
        }, $chavesData);
    }

    /**
     * Get Pix By Id
     *
     * @param   int  $id  Pix Id
     * @return  PixEntity
     */
    public function getById($id)
    {
        $chave = $this->adapter->get(sprintf('%s/pix/addressKeys/%s', $this->endpoint, $id));

        $chave = json_decode($chave);

        return new PixEntity($chave);
    }

    /**
     * Create a Pix key
     *
     * @param   array  data from Pix
     * @return  array  Pix key
     */
    public function create(array $data)
    {
        $chave = $this->adapter->post(sprintf('%s/pix/addressKeys', $this->endpoint), $data);

        $chave = json_decode($chave);

        return new PixEntity($chave);
    }

    /**
     * Delete Pix By Id
     *
     * @param  string|int  $id  Pix Id
     */
    public function delete($id)
    {
        $this->adapter->delete(sprintf('%s/pix/addressKeys/%s', $this->endpoint, $id));
    }



    /**
     * Decode Pix QRCode payment
     *
     * @param   string  payload
     * @return  QrCodeEntity
     */
    public function simulate(array $data = [])
    {
        $pix = $this->adapter->post(sprintf('%s/pix/qrCodes/decode', $this->endpoint), $data);

        $pix = json_decode($pix);

        // Simulate endpoint return response different, so we have to format
        // these values to the usual format
        // $return                      = $pix->bankSlipInfo;
        // $return->fee                 = $pix->fee;
        // $return->minimumScheduleDate = $pix->minimumScheduleDate;

        return new QrCodeEntity($pix);
    }

    /**
     * Pay Pix
     *
     * @param   string  $id  Bill Id
     * @return  QrCodeEntity
     */
    public function pay(array $data = [])
    {
        $pix = $this->adapter->post(sprintf('%s/pix/qrCodes/pay', $this->endpoint), $data);

        $pix = json_decode($pix);

        return new QrCodeEntity($pix);
    }

       /**
     * Get Bill By Id
     *
     * @param   string  $id  Bill Id
     * @return  QrCodeEntity
     */
    public function getTransactionsById($id)
    {
        $payment = $this->adapter->get(sprintf('%s/pix/transactions', $this->endpoint, $id));

        $payment = json_decode($payment);

        return new QrCodeEntity($payment);
    }

    /**
     * Cancel bill
     *
     * @param   string  $id  Bill Id
     * @return  QrCodeEntity
     */
    public function cancel($id)
    {
        $payment = $this->adapter->post(sprintf('%s/pix/transactions/%s/cancel', $this->endpoint, $id));

        $payment = json_decode($payment);

        return new QrCodeEntity($payment);
    }

        /**
     * Get all bills
     *
     * @param   string  $id  Bill Id
     * @return  QrCodeEntity
     */
    public function getTransactionsAll(array $data = [])
    {
        if (!isset($data['limit'])) {
            $data['limit']  = static::DEFAULT_LIMIT;
            $data['offset'] = 0;
        }

        $transactions     = $this->adapter->get(sprintf('%s/pix/transactions?%s', $this->endpoint, http_build_query($data)));
        $transactions     = json_decode($transactions);
        $meta      = $this->extractMeta($transactions);
        $transactionsData = $transactions->data;

        while ($meta->hasMore) {
            $data['offset'] += $data['offset'] > 0 ? $data['limit'] : $data['limit'] + 1;
            $transactions     = $this->adapter->get(sprintf('%s/pix/transactions?%s', $this->endpoint, http_build_query($data)));
            $transactions     = json_decode($transactions);
            $meta      = $this->extractMeta($transactions);
            $transactionsData = array_merge($transactionsData, $transactions->data);
        }

        return array_map(function ($transactions) {
            return new QrCodeEntity($transactions);
        }, $transactionsData);
    }

}
