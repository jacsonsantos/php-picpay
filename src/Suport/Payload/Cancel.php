<?php
namespace PhpPicPay\Suport\Payload;

use PhpPicPay\Cancel\CancelPayloadInterface;

class Cancel implements CancelPayloadInterface
{
    /**
     * @var string
     */
    private $referenceId;

    /**
     * @var string
     */
    private $authorizationId;

    /**
     * id do pedido  Example: "102030"
     *
     * @param string $referenceId
     * @return void
     */
    public function setReferenceId(string $referenceId): void
    {
        $this->referenceId =$referenceId;
    }

    /**
     * @return string
     */
    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    /**
     * ID da autorização que seu e-commerce recebeu na notificação de pedido pago.
     * Caso o pedido não esteja pago, não é necessário enviar este parâmetro.
     *
     * @param string $authorizationId
     * @return void
     */
    public function setAuthorizationId(string $authorizationId): void
    {
        $this->authorizationId = $authorizationId;
    }

    /**
     * @return string
     */
    public function getAuthorizationId(): string
    {
        return $this->authorizationId;
    }
}