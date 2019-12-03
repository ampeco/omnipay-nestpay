# Omnipay: NestPay

**NestPay (EST) (İş Bankası, Akbank, Finansbank, Denizbank, Kuveytturk, Halkbank, Anadolubank, ING Bank, Citibank, Cardplus, Ziraat Bankası sanal pos) gateway for Omnipay payment processing library**

[![Latest Stable Version](https://poser.pugx.org/ampeco/omnipay-nestpay/v/stable)](https://packagist.org/packages/ampeco/omnipay-nestpay) 
[![Total Downloads](https://poser.pugx.org/ampeco/omnipay-nestpay/downloads)](https://packagist.org/packages/ampeco/omnipay-nestpay) 
[![Latest Unstable Version](https://poser.pugx.org/ampeco/omnipay-nestpay/v/unstable)](https://packagist.org/packages/ampeco/omnipay-nestpay) 
[![License](https://poser.pugx.org/ampeco/omnipay-nestpay/license)](https://packagist.org/packages/ampeco/omnipay-nestpay)

For Omnipay v3.x

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements NestPay (Turkish Payment Gateways) support for Omnipay.


NestPay (eski adıyla EST) altyapısını kullanan Türkiye bankaları için Omnipay kütüphanesi. Desteklenmesi hedeflenen bankalar; İş Bankası, Akbank, Finansbank, Denizbank, Kuveytturk, Halkbank, Anadolubank, ING Bank, Citibank, Cardplus, Ziraat Bankası

Supports the API gateway as well as the HTTP Post Gateway methods (3d_pay_hosting, 3d_pay, pay_hosting)


## Installation

    composer require ampeco/omnipay-nestpay:v3.x-dev

## Basic Usage

The following gateways are provided by this package:

* NestPay
    - İş Bankası 
    - Akbank
    - Finansbank 
    - Denizbank
    - Kuveytturk 
    - Halkbank
    - Anadolubank 
    - ING Bank 
    - Citibank 
    - Cardplus
    - Ziraat Bankası

Gateway Methods

* authorize($options) - authorize an amount on the customer's card
* capture($options) - capture an amount you have previously authorized
* purchase($options) - authorize and immediately capture an amount on the customer's card
* refund($options) - refund an already processed transaction
* void($options) - generally can only be called up to 24 hours after submitting a transaction
* credit($options) - money points processed transaction
* settle($options) - settlement query processed transaction
* status($options) - returns status message of the transaction
* createCard($options) - save a credit card using Merchant Safe
* deleteCard($options) - disable a saved credit card using Merchant Safe


For PostGateway

* authorize($options) - forwards the user via HTTP Post to gateway for a PreAuth
* purchase($options) - forwards the user via HTTP Post to gateway for an Auth
* acceptNotification - accepts the result notification from the gateway

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## Unit Tests

PHPUnit is a programmer-oriented testing framework for PHP. It is an instance of the xUnit architecture for unit testing frameworks. No 

## Sample App
            <?php
            
            require __DIR__ . '/vendor/autoload.php';
            
            use Omnipay\Omnipay;
            
            $gateway = Omnipay::create('NestPay');
            
            $gateway->setBank("denizbank");
            $gateway->setUserName("DENIZTEST");
            $gateway->setClientId("800100000");
            $gateway->setPassword("DENIZTEST123");
            $gateway->setTestMode(TRUE);
            
            $options = [
            	'number'        => '5406675406675403',
            	'expiryMonth'   => '12',
            	'expiryYear'    => '2022',
            	'cvv'           => '000',
            	'email'         => 'yasinkuyu@gmail.com',
            	'firstname'     => 'Yasin',
            	'lastname'      => 'Kuyu'
            ];
            
            try {
            		
            	$response = $gateway->purchase(
            	[
            		//'installment'  => '', # Taksit
            		//'moneypoints'  => 1.00, // Set money points (Maxi puan gir)
            		'amount'        => 12.00,
            		'type'          => 'Auth',
            		'transactionId' => 'ORDER-3651233',
            		'card'          => $options
            	]
            	)->send();
            	/*
            	$response = $gateway->authorize(
            	[
            		'type'          => 'PostAuth',
            		'transactionId' => 'ORDER-365123',
            		'card'          => $options
            	]
            	)->send();
            
            	$response = $gateway->capture(
            	[
            		'transactionId' => 'ORDER-365123',
            		'amount'        => 1.00,
            		'currency'      => 'TRY',
            		'card'          => $options
            	]
            	)->send();
            
            
            	$response = $gateway->refund(
            	[
            		'transactionId' => 'ORDER-365123',
            		'amount'        => 1.00,
            		'currency'      => 'TRY',
            		'card'          => $options
            	]
            	)->send();
            
            	$response = $gateway->credit(
            	[
            		'transactionId' => 'ORDER-365123',
            		'amount'        => 1.00,
            		'currency'      => 'TRY', // Optional (default parameter TRY)
            		'card'          => $options
            	]
            	)->send();
            
            	$response = $gateway->void(
            	[
            		'transactionId' => 'ORDER-365123',
            		'amount'        => 1.00,
            		'currency'      => 'TRY',
            		'card'          => $options
            	]
            	)->send();
            
            	$response = $gateway->credit(
            	[
            		'amount'        => 1.00,
            		'card'          => $options
            	]
            	)->send();
            
            	$response = $gateway->settle(
            	[
            		'settlement'   => true,
            		'card'         => $options
            	]
            	)->send();
            
            	$response = $gateway->money(
            	[
            		'moneypoints'  => "1",
            		'card'         => $options
            	]
            	)->send();
            	*/
            	 
                if ($response->isSuccessful()) {
                    echo "Successful";
            		
                } elseif ($response->isRedirect()) {
                    $response->redirect();
            		
                } else {
                    exit($response->getMessage());
                }
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
            
            // Debug
            //var_dump($response);



## Posnet
Posnet (Yapı Kredi, Vakıfbank, Anadolubank) gateway for Omnipay payment processing library
https://github.com/yasinkuyu/omnipay-posnet

## Iyzico
Iyzico gateway for Omnipay payment processing library
https://github.com/yasinkuyu/omnipay-iyzico

## GVP (Granti Sanal Pos)
Gvp (Garanti, Denizbank, TEB, ING, Şekerbank, TFKB) gateway for Omnipay payment processing library
https://github.com/yasinkuyu/omnipay-gvp

## BKM Express
BKM Express gateway for Omnipay payment processing library
https://github.com/yasinkuyu/omnipay-bkm

## Paratika
Paratika (Asseco) (Akbank, TEB, Halkbank, Finansbank, İş Bankası, Şekerbank, Vakıfbank ) gateway for Omnipay payment processing library
https://github.com/yasinkuyu/omnipay-paratika


## Composer Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "ampeco/omnipay-nestpay": "v3.x-dev"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update


## Support

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/uskur/omnipay-nestpay/issues),
or better yet, fork the library and submit a pull request.

## Roadmap
3D Secure payment
