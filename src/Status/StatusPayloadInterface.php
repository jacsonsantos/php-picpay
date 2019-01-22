<?php
namespace PhpPicPay\Status;

interface StatusPayloadInterface
{
    /**
     * seu id de referencia Example: "102030"
     *
     * @param string $referenceId
     * @return void
     */
    public function setReferenceId(string $referenceId) : void;

    /**
     * @return string
     */
    public function getReferenceId() : string;
}