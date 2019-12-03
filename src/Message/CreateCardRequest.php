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

        $safekey = $this->getSafeKey();


        $data['Type'] = 'MerchantSafe';
        $data['Number'] = $this->getCard()->getNumber();
        $data['Expires'] = $this->getCard()->getExpiryMonth() . $this->getCard()->getExpiryYear();
        $data['Extra'] = [
            'MERCHANTSAFE'    => 'ADDCARD',
        ];

        if ($safekey){
            $data['Extra']['MERCHANTSAFEKEY'] = $safekey;
        }

        return $data;
    }

}
