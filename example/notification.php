<?php
declare(strict_types=1);

chdir(dirname(__DIR__));

$config = json_decode(file_get_contents('credentials.json'));

require_once ('vendor/autoload.php');

use PhpPicPay\Exception\InvalidSellerException;
use PhpPicPay\Suport\Config\Credential;
use PhpPicPay\Suport\Listener\NotificationListener;
use PhpPicPay\Suport\Payload\Notification;

$token  = $config->token;
$seller = $config->seller;

try {
    $credential  = new Credential($token,$seller);
    $listener     = new NotificationListener($credential);
    $notification = Notification::parse($listener->wait());

    echo $notification->getReferenceId();
    echo $notification->getAuthorizationId();

} catch (InvalidSellerException $exception) {
    echo $exception->getMessage();
}