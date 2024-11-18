<?php
namespace Imobia\Asaas\Api;

use Imobia\Asaas\Entity\MyAccount as MyAccountEntity;

/**
 * MyAccount API Endpoint
 *
 * @author Mateus Belli <mateusbelli@hotmail.com>
 */
class MyAccount extends \Imobia\Asaas\Api\AbstractApi
{
    /**
     * Get registration situation
     *
     * @return  MyAccountEntity
     */
    public function status()
    {
        $status = $this->adapter->get(sprintf('%s/myAccount/status', $this->endpoint));

        return new MyAccountEntity(json_decode($status));
    }

    /**
     * Get documentation situation
     *
     * @return  MyAccountEntity
     */
    public function documentation()
    {
        $documentation = $this->adapter->get(sprintf('%s/myAccount/status/documentation', $this->endpoint));

        return $documentation;
    }

    public function documents()
    {
        $documents = $this->adapter->get(sprintf('%s/myAccount/documents', $this->endpoint));

        return $documents;
    }

    public function createDocument(array $data, string $id)
    {
        if (array_key_exists('documentFile', $data)) {
            $multipartData = [];

            foreach ($data as $key => $value) {
                if ($value instanceof \Illuminate\Http\UploadedFile) {
                    $multipartElement = [
                        'name'     => $key,
                        'contents' => fopen($value->getPathname(), 'r'),
                        'filename' => $value->getClientOriginalName(),
                        'headers'  => ['Content-Type' => $value->getMimeType()],
                    ];
                } elseif (is_resource($value)) {
                    $multipartElement = [
                        'name'     => $key,
                        'contents' => $value,
                    ];
                } else {
                    $multipartElement = [
                        'name'     => $key,
                        'contents' => is_bool($value) ? ($value ? 'true' : 'false') : $value,
                    ];
                }

                $multipartData[] = $multipartElement;
            }

            $info = $this->adapter->post(sprintf('%s/myAccount/documents/' . $id, $this->endpoint), $multipartData, 'multipart');

            return json_decode($info);
        }

        $documents = $this->adapter->post(sprintf('%s/myAccount/documents/' . $id, $this->endpoint), $data);

        return $documents;
    }

}
