<?php
namespace PhpPicPay\Suport\Transaction;

use PhpPicPay\Cancel\CancelPayloadInterface;
use PhpPicPay\Suport\Config\Credential;
use PhpPicPay\Suport\Config\EndPoint;

class CancelTransaction extends AbstractTransaction
{
    /**
     * @var CancelPayloadInterface
     */
    private $cancelPayload;

    protected $method = 'POST';

    public function __construct(CancelPayloadInterface $cancelPayload, Credential $credential)
    {
        parent::__construct($credential);
        $this->cancelPayload = $cancelPayload;
    }

    public function payload(): array
    {
        $authorizationId = $this->cancelPayload->getAuthorizationId();
        return compact('authorizationId');
    }

    public function url(): string
    {
        return EndPoint::cancel($this->cancelPayload->getReferenceId());
    }
}