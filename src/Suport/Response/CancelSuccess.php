<?php
namespace PhpPicPay\Suport\Response;

use PhpPicPay\Cancel\CancelSuccessInterface;

class CancelSuccess implements CancelSuccessInterface
{
    /**
     * @var string
     */
    private $referenceId;

    /**
     * @var string
     */
    private $cancellationId;

    public static function parse($data)
    {
        $cancelSuccess = new self();
        $cancelSuccess->setReferenceId($data->referenceId);
        $cancelSuccess->setCancellationId($data->cancellationId);

        return $cancelSuccess;
    }

    /**
     * É o seu referenceId da requisição de pagamento.
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
     * Nosso identificador único do cancelamento.
     *
     * @param string $cancellationId
     * @return void
     */
    public function setCancellationId(string $cancellationId): void
    {
        $this->cancellationId = $cancellationId;
    }

    /**
     * @return string
     */
    public function getCancellationId(): string
    {
        return $this->cancellationId;
    }
}