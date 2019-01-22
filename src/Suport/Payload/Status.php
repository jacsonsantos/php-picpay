<?php
namespace PhpPicPay\Suport\Payload;

use PhpPicPay\Status\StatusPayloadInterface;

class Status implements StatusPayloadInterface
{
    /**
     * @var string
     */
    private $referenceId;

    /**
     * seu id de referencia Example: "102030"
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
}