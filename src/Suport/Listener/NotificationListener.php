<?php
namespace PhpPicPay\Suport\Listener;

use PhpPicPay\Exception\InvalidSellerException;
use PhpPicPay\Suport\Config\Credential;

class NotificationListener
{
    /**
     * @var Credential
     */
    private $credential;

    public function __construct(Credential $credential)
    {
        header("Access-Control-Allow-Origin: *");
        header('Cache-Control: no-cache, must-revalidate');
        header("Content-Type: text/plain; charset=UTF-8");
        header(sprintf("%s 200 OK", $_SERVER['SERVER_PROTOCOL']));

        $this->credential = $credential;
    }

    public function wait()
    {
        $result = file_get_contents("php://input");

        if (!array_key_exists('HTTP_X_SELLER_TOKEN',$_SERVER)) {
            throw new InvalidSellerException();
        }

        $seller = $_SERVER['HTTP_X_SELLER_TOKEN'];

        if ($this->credential->getSeller() !== $seller) {
            throw new InvalidSellerException();
        }

        return json_decode($result);
    }
}