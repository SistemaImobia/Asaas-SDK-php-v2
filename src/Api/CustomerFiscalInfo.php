<?php
namespace Imobia\Asaas\Api;

/**
 * Customer Fiscal Info API Endpoint
 *
 * @author David Berri <dwbwill@gmail.com>
 */
class CustomerFiscalInfo extends \Imobia\Asaas\Api\AbstractApi
{
    public function getAll()
    {
        $info = $this->adapter->get(sprintf('%s/customerFiscalInfo', $this->endpoint));

        return json_decode($info);
    }

    public function create(array $data)
    {
        if (array_key_exists('certificateFile', $data)) {
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

            $info = $this->adapter->post(sprintf('%s/customerFiscalInfo', $this->endpoint), $multipartData, 'multipart');

            return json_decode($info);
        }

        $info = $this->adapter->post(sprintf('%s/customerFiscalInfo', $this->endpoint), $data);

        return json_decode($info);
    }

    public function getMunicipalOptions()
    {
        $info = $this->adapter->get(sprintf('%s/customerFiscalInfo/municipalOptions', $this->endpoint));

        return json_decode($info);
    }
}
