<?php
namespace Omnipay\NestPay;

/**
 * NestPay Pay Hosting Gateway
 *
 * @author Burak USGURLU <burak@uskur.com.tr>
 *
 */
class PayHostingGateway extends PostGateway
{

    public function initialize(array $parameters = array())
    {
        parent::initialize($parameters);
        $this->setStoreType('pay_hosting');
    }

    public function getName()
    {
        return 'NestPay Pay Hosting';
    }
}
