<?php
declare(strict_types=1);

chdir(dirname(__DIR__));

$config = json_decode(file_get_contents('credentials.json'));

require_once ('vendor/autoload.php');

use PhpPicPay\Suport\Checkout;
use PhpPicPay\Suport\Config\Credential;
use PhpPicPay\Suport\Payload\Cancel;
use PhpPicPay\Suport\Response\CancelSuccess;
use PhpPicPay\Suport\Transaction\CancelTransaction;
use PhpPicPay\Exception\InvalidTokenException;
use PhpPicPay\Exception\DataValidationException;
use PhpPicPay\Exception\InternalErrorException;

$token  = $config->token;
$seller = $config->seller;

try {
    $credential  = new Credential($token,$seller);

    $cancel = new Cancel();
    $cancel->setReferenceId('a123456');
    $cancel->setAuthorizationId('555008cef7f321d00ef236333');

    $transaction = new CancelTransaction($cancel,$credential);

    $checkout       = new Checkout($transaction);
    $result         = $checkout->send();
    $cancelSuccess  = CancelSuccess::parse($result);

    echo $cancelSuccess->getReferenceId();
    echo $cancelSuccess->getCancellationId();

} catch (InvalidTokenException $exception) {
    echo $exception->getMessage();
} catch (DataValidationException $exception) {
    echo $exception->getMessage();
} catch (InternalErrorException $exception) {
    echo $exception->getMessage();
} catch (\Exception $exception) {
    echo $exception->getMessage();
}