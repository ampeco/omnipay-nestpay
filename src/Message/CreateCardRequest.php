<?php

namespace Omnipay\NestPay\Message;

/**
 * NestPay Authorize Request
 *
 */
class CreateCardRequest extends PurchaseRequest
{

    public function getData()
    {

        $this->validate('safekey');

        $data['Type'] = 'MerchantSafe';
        $data['Number'] = $this->getCard()->getNumber();
        $data['Expires'] = $this->getCard()->getExpiryMonth() . $this->getCard()->getExpiryYear();
        $data['Extra'] = [
            'MERCHANTSAFE'    => 'ADDCARD',
            'MERCHANTSAFEKEY' => $this->getSafeKey(),
        ];

        return $data;
    }

}
