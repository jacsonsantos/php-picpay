<?php
namespace PhpPicPay\Exception;

class InvalidTokenException extends \Exception
{
    public function __construct()
    {
        parent::__construct("o token informado é inválido");
    }
}