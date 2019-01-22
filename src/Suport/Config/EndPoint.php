<?php
namespace PhpPicPay\Suport\Config;

abstract class EndPoint
{
    const PAYMENT = "https://appws.picpay.com/ecommerce/public/payments";

    const CANCEL  = self::PAYMENT."/@/cancellations";

    const STATUS  = self::PAYMENT."/@/status";

    public static function cancel(string $referenceId) : string
    {
        return str_replace('@',$referenceId,self::CANCEL);
    }

    public static function status(string $referenceId) : string
    {
        return str_replace('@',$referenceId,self::STATUS);
    }
}