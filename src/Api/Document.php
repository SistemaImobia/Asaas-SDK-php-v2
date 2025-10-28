<?php

namespace Imobia\Asaas\Api;

// Entities
use Imobia\Asaas\Entity\Document as DocumentEntity;

/**
 * Document API Endpoint
 *
 * @author David Berri <dwbwill@gmail.com>
 */
class Document extends \Imobia\Asaas\Api\AbstractApi
{
    public function getAll(array $filters = [])
    {
        $documents = $this->adapter->get(sprintf('%s/documents?%s', $this->endpoint, http_build_query($filters)));

        $documents = json_decode($documents, true);

        return $documents;
    }

    public function create(array $data)
    {
        $multipartData = [];
        foreach ($data as $key => $value) {
            $multipartData[] = [
                'name'     => $key,
                'contents' => $value,
            ];
        }

        $document = $this->adapter->post(sprintf('%s/documents', $this->endpoint), $multipartData, 'multipart');

        $document = json_decode($document);

        return new DocumentEntity($document);
    }
}
