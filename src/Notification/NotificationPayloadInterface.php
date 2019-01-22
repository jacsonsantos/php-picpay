<?php
namespace PhpPicPay\Notification;

interface NotificationPayloadInterface
{
    /**
     * Identificador da transação
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
     * Identificador único da autorização, caso pago/em análise.
     * Você deve usar esse valor para realizar estornos em nossa API.
     *
     * @param string $authorizationId
     * @return void
     */
    public function setAuthorizationId(string $authorizationId) : void;

    /**
     * @return string
     */
    public function getAuthorizationId() : string;
}