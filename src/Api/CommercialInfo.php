<?php

namespace Imobia\Asaas\Api;

use Imobia\Asaas\Entity\CommercialInfo as CommercialInfoEntity;

/**
 * PaymentCheckoutConfig API Endpoint
 *
 * @author Mateus Belli <mateusbelli@hotmail.com>
 */
class CommercialInfo extends \Imobia\Asaas\Api\AbstractApi
{
    /**
     * Recover customization
     *
     * @return CommercialInfoEntity
     */
    public function get()
    {
        $commercialInfo = $this->adapter->get(sprintf('%s/myAccount/commercialInfo', $this->endpoint));

        $commercialInfo = json_decode($commercialInfo);

        return new CommercialInfoEntity($commercialInfo);
    }

    public function update(array $data)
    {
        $update = $this->adapter->put(sprintf('%s/myAccount/commercialInfo', $this->endpoint), $data);

        $update = json_decode($update);

        return new CommercialInfoEntity($update);
    }
}
