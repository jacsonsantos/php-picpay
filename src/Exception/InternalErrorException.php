<?php
namespace PhpPicPay\Exception;

class InternalErrorException extends \Exception
{
    public function __construct()
    {
        parent::__construct("problema geral, verifique se a transação foi criada e/ou cancele a mesma");
    }
}