<?php
namespace PhpPicPay\Suport\Request;

interface RequestInterface
{
    public function payload() : array;

    public function header() : array;

    public function url() : string;

    public function method() : string;
}