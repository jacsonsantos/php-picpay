<?php
namespace PhpPicPay\Exception;

class InvalidSellerException extends \Exception
{
    public function __construct()
    {
        parent::__construct("o seller informado é inválido");
    }
}