<?php
namespace PhpPicPay\Status;

interface StatusSuccessInterface
{
    /**
     * Seu referenceId
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
     * Enum:"created" "expired" "analysis" "paid" "completed" "refunded" "chargeback"
     *
     * "created": registro criado
     * "expired": prazo para pagamento expirado
     * "analysis": pago e em processo de análise anti-fraude
     * "paid": pago
     * "completed": pago e saldo disponível
     * "refunded": pago e devolvido
     * "chargeback": pago e com chargeback
     *
     * @param string $status
     * @return void
     */
    public function setStatus(string $status) : void;

    /**
     * @return string
     */
    public function getStatus() : string;
}