<?php
namespace Imobia\Asaas\Api;

use Imobia\Asaas\Entity\FinancialTransaction as FinancialTransactionEntity;

/**
 * FinancialTransaction API Endpoint
 *
 * @author David Berri <dwbwill@gmail.com>
 */
class FinancialTransaction extends \Imobia\Asaas\Api\AbstractApi
{
    /**
     * Get all FinancialTransactions
     *
     * @param   array  $filters
     * @return  array
     */
    public function getAll(array $filters = [])
    {
        if (!isset($filters['limit'])) {
            $filters['limit'] = static::DEFAULT_LIMIT;
        }

        if (!isset($filters['offset'])) {
            $filters['offset'] = 0;
        }

        $asaasFilters = $filters;
        unset($asaasFilters['page']);

        $extrato = $this->adapter->get(
            sprintf('%s/financialTransactions?%s', $this->endpoint, http_build_query($asaasFilters))
        );

        $extrato  = json_decode($extrato);
        $response = $extrato->data;
        $meta     = $this->extractMeta($extrato);

        $limit       = (int) ($meta->limit ?? $filters['limit'] ?? 50);
        $offset      = (int) ($meta->offset ?? $filters['offset'] ?? 0);
        $hasMore     = $meta->hasMore ?? false;
        $currentPage = $limit > 0 ? (int) floor($offset / $limit) + 1 : 1;
        $lastPage    = $hasMore ? ($currentPage + 1) : $currentPage;
        $total       = $hasMore ? ($offset + $limit * 2) : ($offset + $limit);

        $metaResponse = [
            'limit'        => $limit,
            'offset'       => $offset,
            'hasMore'      => $hasMore,
            'page'         => $currentPage,
            'current_page' => $currentPage,
            'last_page'    => $lastPage,
            'total'        => $total,
        ];

        return [
            'response' => array_map(
                fn ($transaction) => new FinancialTransactionEntity($transaction),
                $response
            ),
            'meta' => $metaResponse,
        ];
    }
}
