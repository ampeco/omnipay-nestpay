<?php

namespace Omnipay\NestPay\Message;

/**
 * NestPay Authorize Request
 *
 */
class DeleteCardRequest extends PurchaseRequest
{

    public function getData()
    {

        $this->validate('safekey');

        $data['Type'] = 'MerchantSafe';
        $data['Extra'] = [
            'MERCHANTSAFE'    => 'DISABLECARDS',
            'MERCHANTSAFEKEY' => $this->getSafeKey(),
        ];

        return $data;
    }

}
