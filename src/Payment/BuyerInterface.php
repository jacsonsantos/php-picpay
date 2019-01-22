<?php
namespace PhpPicPay\Payment;

interface BuyerInterface
{
    /**
     * Primeiro nome do comprador.
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName(string $firstName) : void;

    /**
     * @return string
     */
    public function getFirstName() : string;

    /**
     * Sobrenome do comprador.
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName(string $lastName) : void;

    /**
     * @return string
     */
    public function getLastName() : string;

    /**
     * CPF do comprador no formato 123.456.789-10
     *
     * @param string $document
     * @return void
     */
    public function setDocument(string $document) : void;

    /**
     * @return string
     */
    public function getDocument() : string;

    /**
     * E-mail do comprador.
     *
     * @param string $email
     * @return void;
     */
    public function setEmail(string $email) : void;

    /**
     * @return string
     */
    public function getEmail() : string;

    /**
     * Numero de telefone do comprador no formato +55 27 12345-6789
     *
     * @param string $phone
     * @return void
     */
    public function setPhone(string $phone) : void;

    /**
     * @return string
     */
    public function getPhone() : string ;
}