<?php
namespace PhpPicPay\Payment;

interface PayloadInterface 
{
    /**
     * Identificador único do seu pedido. Este campo precisa ter um valor diferente a cada requisição.
     * Este também será o ID exibido ao cliente no momento do pagamento e também será o ID que sua loja 
     * utilizará para ver status de pagamento, solicitar cancelamento, etc.
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
     * Url para o qual o PicPay irá retornar a situação do pagamento.
     *
     * @param string $callbackUrl
     * @return void
     */
    public function setCallbackUrl(string  $callbackUrl) : void;

    /**
     * @return string
     */
    public function getCallbackUrl() : string ;

    /**
     * Url para a qual o cliente será redirecionado após o pagamento.
     *
     * @param string $returnUrl
     * @return void
     */
    public function setReturnUrl(string $returnUrl) : void;

    /**
     * @return string
     */
    public function getReturnUrl() : string;

    /**
     * Valor do pagamento em reais.
     *
     * @param float $value
     * @return void
     */
    public function setValue(float $value) : void;

    /**
     * @return float
     */
    public function getValue() : float;

    /**
     * Objeto contendo as informações do comprador.
     *
     * @param \PhpPicPay\Payment\BuyerInterface $buyer
     * @return void
     */
    public function setBuyer(BuyerInterface $buyer) : void;

    /**
     * @return \PhpPicPay\Payment\BuyerInterface
     */
    public function getBuyer() : BuyerInterface;
}