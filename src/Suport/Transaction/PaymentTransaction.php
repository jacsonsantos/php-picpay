<?php
namespace PhpPicPay\Suport\Transaction;

use PhpPicPay\Payment\PayloadInterface;
use PhpPicPay\Suport\Config\Credential;
use PhpPicPay\Suport\Config\EndPoint;

class PaymentTransaction extends AbstractTransaction
{
    /**
     * @var PayloadInterface
     */
    private $payment;

    /**
     * @var string
     */
    protected $method = 'POST';

    public function __construct(PayloadInterface $payment, Credential $credential)
    {
        parent::__construct($credential);
        $this->payment = $payment;
    }

    public function payload(): array
    {
        $referenceId = $this->payment->getReferenceId();
        $callbackUrl = $this->payment->getCallbackUrl();
        $returnUrl   = $this->payment->getReturnUrl();
        $value       = $this->payment->getValue();

        $buyer['firstName'] = $this->payment->getBuyer()->getFirstName();
        $buyer['lastName']  = $this->payment->getBuyer()->getLastName();
        $buyer['document']  = $this->payment->getBuyer()->getDocument();
        $buyer['email']     = $this->payment->getBuyer()->getEmail();
        $buyer['phone']     = $this->payment->getBuyer()->getPhone();

        return compact('referenceId','callbackUrl','returnUrl','value','buyer');
    }

    public function url(): string
    {
        return EndPoint::PAYMENT;
    }
}