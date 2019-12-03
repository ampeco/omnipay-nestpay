<?php
namespace Omnipay\NestPay\Message;

/**
 * NestPay Complete Capture Request
 *
 * (c) Yasin Kuyu
 * 2015, insya.com
 * http://www.github.com/yasinkuyu/omnipay-nestpay
 */
class CaptureRequest extends PurchaseRequest
{

    public function getData()
    {
        $this->validate('amount');
        
        $data['Type'] = 'PostAuth';
        $data['OrderId'] = $this->getTransactionId();
        $data['Currency'] = $this->getCurrencyNumeric();
        $data['Total'] = $this->getAmount();
        
        return $data;
    }
}
