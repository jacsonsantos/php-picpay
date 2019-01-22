<?php
namespace PhpPicPay\Suport\Payload;

use PhpPicPay\Notification\NotificationPayloadInterface;

class Notification implements NotificationPayloadInterface
{
    /**
     * @var string
     */
    private $referenceId;

    /**
     * @var string
     */
    private $authorizationId;

    public static function parse($data)
    {
        $notification = new self();
        $notification->setReferenceId($data->referenceId);
        $notification->setAuthorizationId($data->authorizationId);

        return $notification;
    }

    /**
     * Identificador da transação
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
     * Identificador único da autorização, caso pago/em análise.
     * Você deve usar esse valor para realizar estornos em nossa API.
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