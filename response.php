<?php
session_start();

use Freshwork\Transbank\RedirectorHelper;
use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;

include 'vendor/autoload.php';

$bag = CertificationBagFactory::integrationWebpayNormal();

$webpay = TransbankServiceFactory::normal($bag);

$result = $webpay->getTransactionResult();

$_SESSION['responseCode'] = $result->detailOutput->responseCode;

if ($result->detailOutput->responseCode == 0) {
    echo 'Transacción aprobada y exitosa';
} else {
    echo 'Rechazada';
}

$webpay->acknowledgeTransaction();

echo RedirectorHelper::redirectBackNormal($result->urlRedirection);