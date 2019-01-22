<?php
declare(strict_types=1);

chdir(dirname(__DIR__));

$config = json_decode(file_get_contents('credentials.json'));

require_once ('vendor/autoload.php');

use PhpPicPay\Suport\Checkout;
use PhpPicPay\Suport\Payload\Payment;
use PhpPicPay\Suport\Payload\Buyer;
use PhpPicPay\Suport\Config\Credential;
use PhpPicPay\Suport\Transaction\PaymentTransaction;
use PhpPicPay\Suport\Response\PaymentSuccess;
use PhpPicPay\Exception\InvalidTokenException;
use PhpPicPay\Exception\DataValidationException;
use PhpPicPay\Exception\InternalErrorException;

$token  = $config->token;
$seller = $config->seller;

try {
    $payment = new Payment();

    $payment->setReferenceId("abc123");
    $payment->setCallbackUrl("http://localhost/callback");
    $payment->setReturnUrl("http://localhost/product/abc123");
    $payment->setValue(23.98);

    $buyer = new Buyer();
    $buyer->setFirstName('Jacson');
    $buyer->setLastName('Santos');
    $buyer->setDocument('123.456.789-10');
    $buyer->setEmail('me@mail.com');
    $buyer->setPhone('+55 98 12345-6789');

    $payment->setBuyer($buyer);

    $credential  = new Credential($token,$seller);
    $transaction = new PaymentTransaction($payment,$credential);

    $checkout       = new Checkout($transaction);
    $result         = $checkout->send();
    $paymentSuccess = PaymentSuccess::parse($result);

    echo $paymentSuccess->getReferenceId();
    echo $paymentSuccess->getPaymentUrl();

} catch (InvalidTokenException $exception) {
    echo $exception->getMessage();
} catch (DataValidationException $exception) {
    echo $exception->getMessage();
} catch (InternalErrorException $exception) {
    echo $exception->getMessage();
} catch (\Exception $exception) {
    echo $exception->getMessage();
}