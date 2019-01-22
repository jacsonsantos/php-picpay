<?php
declare(strict_types=1);

chdir(dirname(__DIR__));

$config = json_decode(file_get_contents('credentials.json'));

require_once ('vendor/autoload.php');

use PhpPicPay\Suport\Checkout;
use PhpPicPay\Suport\Config\Credential;
use PhpPicPay\Suport\Response\StatusSuccess;
use PhpPicPay\Suport\Transaction\StatusTransaction;
use PhpPicPay\Exception\InvalidTokenException;
use PhpPicPay\Exception\DataValidationException;
use PhpPicPay\Exception\InternalErrorException;
use PhpPicPay\Suport\Payload\Status;

$token  = $config->token;
$seller = $config->seller;

try {
    $credential = new Credential($token,$seller);

    $status = new Status();
    $status->setReferenceId("a123456");

    $transaction = new StatusTransaction($status,$credential);

    $checkout       = new Checkout($transaction);
    $result         = $checkout->send();
    $statusSuccess  = StatusSuccess::parse($result);

    echo $statusSuccess->getReferenceId();
    echo $statusSuccess->getStatus();

} catch (InvalidTokenException $exception) {
    echo $exception->getMessage();
} catch (DataValidationException $exception) {
    echo $exception->getMessage();
} catch (InternalErrorException $exception) {
    echo $exception->getMessage();
} catch (\Exception $exception) {
    echo $exception->getMessage();
}