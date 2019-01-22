<?php
namespace PhpPicPay\Suport\Transaction;

use PhpPicPay\Suport\Config\Credential;
use PhpPicPay\Suport\Request\RequestInterface;

abstract class AbstractTransaction implements RequestInterface
{
    /**
     * @var Credential
     */
    protected $credential;

    /**
     * @var string
     */
    protected $method = 'GET';

    public function __construct(Credential $credential)
    {
        $this->credential = $credential;
    }

    public function payload(): array
    {
        return array();
    }

    public function url(): string
    {
        return '';
    }

    public function header(): array
    {
        return [
            sprintf('x-picpay-token: %s', $this->credential->getToken())
        ];
    }

    public function method(): string
    {
        return $this->method;
    }
}