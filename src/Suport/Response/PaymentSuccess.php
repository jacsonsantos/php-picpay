<?php
namespace PhpPicPay\Suport\Response;

use PhpPicPay\Payment\PaymentSuccessInterface;

class PaymentSuccess implements PaymentSuccessInterface
{
    /**
     * @var string
     */
    private $referenceId;

    /**
     * @var string
     */
    private $paymentUrl;

    public static function parse($data)
    {
        $paymentSuccess = new self();
        $paymentSuccess->setReferenceId($data->referenceId);
        $paymentSuccess->setPaymentUrl($data->paymentUrl);

        return $paymentSuccess;
    }

    /**
     * Seu referenceId
     *
     * @param string $referenceId
     * @return void
     */
    public function setReferenceId(string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * @return string
     */
    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    /**
     * URL na qual sua loja deve redirecionar o cliente para conclusão do pagamento
     *
     * @param string $paymentUrl
     * @return void
     */
    public function setPaymentUrl(string $paymentUrl): void
    {
        $this->paymentUrl = $paymentUrl;
    }

    /**
     * @return string
     */
    public function getPaymentUrl(): string
    {
        return $this->paymentUrl;
    }
}