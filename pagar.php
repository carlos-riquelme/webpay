<?php

use Freshwork\Transbank\RedirectorHelper;
use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;

include 'vendor/autoload.php';

$bag = CertificationBagFactory::integrationWebpayNormal();

$webpay = TransbankServiceFactory::normal($bag);

$webpay->addTransactionDetail(1000, 'carro'.rand(1,100000));

$response = $webpay->initTransaction('http://localhost/webpay/response.php', 'http://localhost/webpay/finish.php');

echo RedirectorHelper::redirectHTML($response->url, $response->token);