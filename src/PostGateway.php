<?php
namespace Omnipay\NestPay;

/**
 * NestPay Post Gateway
 *
 * @author Burak USGURLU <burak@uskur.com.tr>
 *        
 */
class PostGateway extends Gateway
{

    public function getName()
    {
        return 'NestPay Post';
    }

    public function getDefaultParameters()
    {
        return array(
            'bank' => '',
            'username' => '',
            'clientId' => '',
            'storetype'   => '3d_pay_hosting',
            'storekey'    => '',
            'password'    => '',
            'installment' => '',
            'islemtipi'   => 'Auth',
            'currency'    => 'TRY',
            'testMode'    => false,
            'okUrl'       => '',
            'failUrl'     => '',
            'callbackurl' => '',
            'lang'        => 'tr'
        );
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\NestPay\Message\AuthorizePostRequest', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\NestPay\Message\PurchasePostRequest', $parameters);
    }

    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\NestPay\Message\CreateCardPostRequest', $parameters);
    }

    public function acceptNotification(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\NestPay\Message\StatusRequest', $parameters);
    }

    public function getStoreType()
    {
        return $this->getParameter('storetype');
    }

    public function setStoreType($value)
    {
        return $this->setParameter('storetype', $value);
    }

    public function getStoreKey()
    {
        return $this->getParameter('storekey');
    }

    public function setStoreKey($value)
    {
        return $this->setParameter('storekey', $value);
    }

    public function getLang()
    {
        return $this->getParameter('lang');
    }

    public function setLang($value)
    {
        return $this->setParameter('lang', $value);
    }
}
