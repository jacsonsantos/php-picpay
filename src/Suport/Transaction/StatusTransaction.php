<?php
namespace PhpPicPay\Suport\Transaction;

use PhpPicPay\Status\StatusPayloadInterface;
use PhpPicPay\Suport\Config\Credential;
use PhpPicPay\Suport\Config\EndPoint;

class StatusTransaction extends AbstractTransaction
{
    /**
     * @var StatusPayloadInterface
     */
    private $statusPayload;

    public function __construct(StatusPayloadInterface $statusPayload, Credential $credential)
    {
        parent::__construct($credential);
        $this->statusPayload = $statusPayload;
    }

    public function url(): string
    {
        return EndPoint::status($this->statusPayload->getReferenceId());
    }
}