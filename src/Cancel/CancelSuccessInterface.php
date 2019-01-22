<?php
namespace PhpPicPay\Cancel;

interface CancelSuccessInterface
{
    /**
     * É o seu referenceId da requisição de pagamento.
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
     * Nosso identificador único do cancelamento.
     *
     * @param string $cancellationId
     * @return void
     */
    public function setCancellationId(string $cancellationId) : void;

    /**
     * @return string
     */
    public function getCancellationId() : string;
}