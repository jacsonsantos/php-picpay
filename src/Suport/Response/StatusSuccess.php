<?php
namespace PhpPicPay\Suport\Response;

use PhpPicPay\Status\StatusSuccessInterface;

class StatusSuccess implements StatusSuccessInterface
{
    /**
     * @var string
     */
    private $referenceId;

    /**
     * @var string
     */
    private $status;

    public static function parse($data)
    {
        $statusSuccess = new self();
        $statusSuccess->setReferenceId($data->referenceId);
        $statusSuccess->setStatus($data->status);

        return $statusSuccess;
    }

    /**
     * Seu referenceId
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
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}