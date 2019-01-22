<?php
namespace PhpPicPay\Cancel;

interface CancelPayloadInterface
{
    /**
     * id do pedido  Example: "102030"
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
     * ID da autorização que seu e-commerce recebeu na notificação de pedido pago.
     * Caso o pedido não esteja pago, não é necessário enviar este parâmetro.
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