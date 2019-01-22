<?php
namespace PhpPicPay\Exception;

class DataValidationException extends \Exception
{
    public function __construct()
    {
        parent::__construct("algumas propriedades não passaram no teste de validação");
    }
}