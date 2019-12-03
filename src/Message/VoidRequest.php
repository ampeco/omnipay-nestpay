<?php
namespace Omnipay\NestPay\Message;

/**
 * NestPay Void Request
 *
 * (c) Yasin Kuyu
 * 2015, insya.com
 * http://www.github.com/yasinkuyu/omnipay-nestpay
 */
class VoidRequest extends PurchaseRequest
{

    public function getData()
    {
        $data['Type'] = 'Void';
        $data['TransId'] = $this->getTransactionId();
        
        return $data;
    }
}
