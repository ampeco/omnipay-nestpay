<?php

namespace Omnipay\NestPay\Message;

/**
 *
 * @author burak
 *
 */
class CreateCardPostRequest extends PostRequest
{

    public function getData()
    {
        if (empty($this->getType())) {
            $this->setType('Auth');
        }
        $data = parent::getData();
        $data['MERCHANTSAFE'] = 'ADDCARD';
        return $data;
    }
}
