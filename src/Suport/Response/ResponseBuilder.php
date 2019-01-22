<?php
namespace PhpPicPay\Suport\Response;

use PhpPicPay\Suport\Transaction\PaymentTransaction;
use PhpPicPay\Suport\Transaction\StatusTransaction;

class ResponseBuilder
{
    /**
     * @param $data
     * @param $request
     * @return null|PaymentSuccess
     */
    public static function create($data,$request)
    {
        if ($request instanceof PaymentTransaction) {
            return self::paymentBuilder($data);
        }

//        if ($request instanceof CancelTransaction) {
//            self::cancelBuilder($data);
//        }

        if ($request instanceof StatusTransaction) {
            self::statusBuilder($data);
        }

        return null;
    }

    /**
     * @param $data
     * @return PaymentSuccess
     */
    private static function paymentBuilder($data) : PaymentSuccess
    {
        $payment = new PaymentSuccess();
        $payment->setReferenceId($data->referenceId);
        $payment->setPaymentUrl($data->paymentUrl);

        return $payment;
    }

    private static function statusBuilder($data) : StatusSuccess
    {
        $status = new StatusSuccess();
        $status->setReferenceId($data->referenceId);
        $status->setStatus($data->status);

        return $status;
    }
}