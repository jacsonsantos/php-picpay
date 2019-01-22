<?php
namespace PhpPicPay\Payment;

interface PaymentSuccessInterface
{
    /**
     * Seu referenceId
     *
     * @param string $referenceId
     * @return void
     */
    public function setReferenceId(string $referenceId) : void;

    /**
     * @return string
     */
    public function getReferenceId() : string;

    /**
     * URL na qual sua loja deve redirecionar o cliente para conclusão do pagamento
     *
     * @param string $paymentUrl
     * @return void
     */
    public function setPaymentUrl(string $paymentUrl) : void;

    /**
     * @return string
     */
    public function getPaymentUrl() : string;
}