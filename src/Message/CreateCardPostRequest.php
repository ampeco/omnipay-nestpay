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
        $data['MERCHANTSAFE'] = 'MERCHANTSAFE';
        $data['MERCHANTSAFEAUTHTYPE'] = $this->getTestMode() ? 'NOAUTH' : '3DPAYAUTH';
        $data['MERCHANTSAFEKEY'] = '';
        $data['hash'] = $this->sign(
            $data['clientid'],
            $data['oid'],
            $data['amount'],
            $data['okUrl'],
            $data['failUrl'],
            $data['islemtipi'],
            $data['taksit'],
            $data['rnd'],
            $data['MERCHANTSAFEAUTHTYPE'],
            $data['MERCHANTSAFEKEY']
        );
        return $data;
    }
}
